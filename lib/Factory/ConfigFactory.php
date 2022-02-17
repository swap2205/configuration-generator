<?php

namespace Configuration\Factory;

/**
 * Class to get the file contents from files using ConfigGeneratorFactory interface,
 * which will check for the file type (json / yaml) and load the respective data
 */
class ConfigFactory
{
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Method to load the file content 
     * @param ConfigGeneratorFactory $configGeneratorFactory
     */
    public function loadFileContents(ConfigGeneratorFactory $configGeneratorFactory)
    {
        return $configGeneratorFactory->create($this->filePath);
    }
}
