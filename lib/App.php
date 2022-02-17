<?php

namespace Configuration;

class App
{
    public function runCommand(array $argv)
    {
        // print_r($argv);

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