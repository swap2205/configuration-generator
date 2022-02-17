<?php

namespace Configuration\Factory;

class JsonConfigFactory implements ConfigGeneratorFactory
{

    /**
     * Method to load and read json file content
     * @param string $filePath
     * @return array / false 
     */
    public function create(string $filePath)
    {
        // parse the JSON file
        $jsonData = json_decode(file_get_contents($filePath), 1);

        return $jsonData;
    }
}
