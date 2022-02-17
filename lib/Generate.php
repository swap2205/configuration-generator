<?php

namespace Configuration;

use Configuration\Factory\ConfigFactory;
use Configuration\Factory\JsonConfigFactory;
use Configuration\Factory\YamlConfigFactory;
use Exception;

class Generate
{
    /**
     * Method to generate the configuration file based on the array inputs received
     * @param array $filePaths - array of file names to generate the configuration file
     * @return true/false -> if file generated successfully or not
     */
    public function create(array $filePaths)
    {
        if (count($filePaths) === 0) {
            print("Please enter file paths to import configuration files");
            exit;
        }
        $json_data = [];
        foreach ($filePaths as $path) {
            if (file_exists($path)) {
                if (is_dir($path)) {
                    $this->readDir($path, $json_data);
                } else if (is_file($path)) {
                    $this->readFile($path, $json_data);
                } else {
                    print("$path is invalid path\n");
                }
            } else {
                print("$path is invalid path\n");
            }
        }
        $original_array = Helper::loadConfig();

        $config_data = array_merge($original_array, ...$json_data);
        return Helper::saveConfig($config_data);
    }

    /**
     * internal method to read the directory content
     * @param string $path - path of the directory
     * @param array &$array_data - address reference of the original array to be used to generate the configuration file
     */

    private function readDir(string $path, array &$array_data)
    {
        $array_data = [];
        if (is_dir($path)) {
            $files = scandir($path);
            unset($files[0], $files[1]);

            foreach ($files as $file) {
                $this->readFile($path . $file, $array_data);
            }
        }
    }
    /**
     * internal method to read the file content
     * @param string $path - path of the directory
     * @param array &$array_data - address reference of the original array to be used to generate the configuration file
     */

    private function readFile(string $path, array &$array_data)
    {

        try {
            $file_arr = explode(".", $path);
            $file_extension = $file_arr[count($file_arr) - 1];
            $configFactory = new ConfigFactory($path);
            $data = [];
            if (mime_content_type($path) === 'application/json') {
                $data = $configFactory->loadFileContents(new JsonConfigFactory());
            }
            if (mime_content_type($path) === 'text/plain' && in_array($file_extension, ['yaml', 'yml'])) {
                $data = $configFactory->loadFileContents(new YamlConfigFactory());
            }

            if ($data) {
                $array_data[] = $data;
            }
        } catch (Exception $e) {}
    }
}
