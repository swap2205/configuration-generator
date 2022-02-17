<?php 

namespace Configuration\Factory;

interface ConfigGeneratorFactory{
    public function create(string $filePath);
}