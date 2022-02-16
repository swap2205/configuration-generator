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

            default:
                echo "Invalid command";
        }
    }
}
