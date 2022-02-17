<?php

namespace Configuration;

class Update
{
    /**
     * Method to add a new value OR update the existing value as per the dot separated path in the configuration
     * @param array $update_data - holds the key value pair of the fields to be inserted or updated
     */
    public function set(array $update_data)
    {
        if (count($update_data) >= 2) {
            Helper::updateConfig($update_data[0], $update_data[1]);
        } else {
            print("Please enter valid Key Value pair to update the config data");
        }
    }
}
