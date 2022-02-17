<?php

namespace Configuration;

class Read
{
    /**
     * Method to get the value of the dot separated path from the configuration
     * @param array $dot_path
     * @return  string/null 
     */
    public function get(array $dot_path)
    {
        if (!isset($dot_path[0])) {
            print("Please enter a dot path to read the configuration");
            exit;
        }

        $data = Helper::readConfig($dot_path[0]);

        return $data;
    }
}
