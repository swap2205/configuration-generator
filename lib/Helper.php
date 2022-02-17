<?php

namespace Configuration;

class Helper
{

    const CONFIG_FOLDER_PATH = "config/";
    const CONFIG_FILE_PATH = Helper::CONFIG_FOLDER_PATH . "app-config.json";
    public static function loadConfig(): array
    {
        $config_data = [];

        if (file_exists(Helper::CONFIG_FILE_PATH)) {
            $config_data = json_decode(file_get_contents(Helper::CONFIG_FILE_PATH), 1);
        }
        return $config_data;
    }

    public static function saveConfig($config_data)
    {
        if (!file_exists(Helper::CONFIG_FOLDER_PATH)) {
            mkdir(Helper::CONFIG_FOLDER_PATH, 0755, true);
        }
        if (!file_exists(Helper::CONFIG_FILE_PATH)) {
            touch(Helper::CONFIG_FILE_PATH, strtotime('-1 days'));
        }
        return file_put_contents(Helper::CONFIG_FILE_PATH, json_encode($config_data));
    }

    public static function updateConfig($dotPathKey, $value): void
    {
        $config_data = self::loadConfig();
        $arr = &$config_data;

        $conf_keys = explode('.', $dotPathKey);

        foreach ($conf_keys as $key) {
            if (!isset($arr[$key])) {
                $arr[$key] = [];
            }
            if (!is_array($arr[$key])) {
                $arr[$key] = $value;
            }
            $arr = &$arr[$key];
        }

        $arr = $value;
        self::saveConfig($config_data);
    }

    public static function readConfig($dotPath)
    {
        $config_data = self::loadConfig();

        $conf_keys = explode('.', $dotPath);
        $arr_val = null;

        foreach ($conf_keys as $key) {
            if (!isset($config_data[$key])) {
                $arr_val = null;
                break;
            }
            $arr_val = $config_data[$key];
            $config_data = $arr_val;
        }

        return $arr_val;
    }
}
