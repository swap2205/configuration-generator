<?php

namespace Configuration;

class App
{
    /**
     * Method to execute the command for configuration options
     * Available options - 
     * 1. generate
     * 2. read
     * 3. update
     */
    public function runCommand(array $argv)
    {
        switch ($argv[1]) {
            case 'generate':
                $generate = new Generate();
                $generate->create(array_slice($argv, 2));
                break;
            case 'read':
                $reader = new Read();
                $data = $reader->get(array_slice($argv, 2));
                if (is_array($data)) {
                    print_r($data);
                } else {
                    echo $data;
                }
                break;
            case 'update':
                $updater = new Update();
                $updater->set(array_slice($argv, 2));
                break;

            default:
                echo "Invalid command";
        }
    }
}
