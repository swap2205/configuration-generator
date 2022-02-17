<?php 
namespace Configuration\Factory;

class JsonConfigFactory implements ConfigGeneratorFactory{

    public function create(string $filePath)
    {
        // parse the JSON file
        $jsonData = json_decode(file_get_contents($filePath), 1);
       
        return $jsonData;
    }
}