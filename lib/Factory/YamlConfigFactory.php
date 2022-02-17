<?php

namespace Configuration\Factory;

class YamlConfigFactory implements ConfigGeneratorFactory
{
    /**
     * Method to load and read yaml file content
     * @param string $filePath
     * @return array / false 
     */

    public function create(string $filePath)
    {
        /**
         * Parse a yaml file to convert the file contents to array.
         * It returns an array if file is successfully parsed
         * OR returns false on failure
         */
        $yamlData = @yaml_parse_file($filePath);
        return $yamlData;
    }
}
