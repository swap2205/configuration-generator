<?php

namespace Configuration;

class Update
{
    public function set(array $update_data)
    {
        if (count($update_data) >= 2) {
            Helper::updateConfig($update_data[0], $update_data[1]);
        } else {
            print("Please enter valid Key Value pair to update the config data");
        }
    }
}
