<?php

namespace Configuration;

class Generate
{
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
        // print_r($config_data);
        return Helper::saveConfig($config_data);
    }

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

    private function readFile(string $path, array &$array_data)
    {
        // echo "$file <br>";
        if (mime_content_type($path) === 'application/json') {
            // parse the file
            $array_data[] = json_decode(file_get_contents($path), 1);
        }
    }
}
