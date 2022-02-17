<?php

namespace Configuration\Factory;

class ConfigFactory
{
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }
    public function loadFileContents(ConfigGeneratorFactory $configGeneratorFactory)
    {
        return $configGeneratorFactory->create($this->filePath);
    }
}
