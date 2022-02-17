<?php

namespace Configuration\Factory;

class YamlConfigFactory implements ConfigGeneratorFactory
{
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