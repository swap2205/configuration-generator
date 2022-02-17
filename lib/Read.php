<?php

namespace Configuration;

class Read
{
    public function get(array $argv)
    {
        if (!isset($argv[0])) {
            print("Please enter a dot path to read the configuration");
            exit;
        }

        $data = Helper::readConfig($argv[0]);

        return $data;
    }
}
