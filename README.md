# Configuration Generator - Divido Coding Challenge

Configuration generator is a simple configuration file maker in json format. The generator can be used two-ways:

1. CLI tool to generate, read & update the configuration
2. Classes to use directly in the code to generate, read & update the configuration

## Installation

To setup, we have to run the following composer command

```bash
composer install
```

## CLI Tool

### 1. Generate new or Update the existing configuration by loading one or more files

Use the following command: **php configure generate file_path1 [file_path2] [file_path3] ...**

**Note**: Can accept json & yaml files only

```bash
php configure generate fixtures/config.json fixtures/config.invalid.json fixtures/sample1.yaml
```

### 2. Read the configuration using dot notation

To read the value from the configuration we can Use the following command: **php configure read [key1].[key2].[...]**.

Here **key** can be a dot separated path in the configuration json file.

```bash
php configure read database.host
```

### 3. Update the configuration using dot notation

To update the value of a key in the configuration we can Use the following command: **php configure update key <value>**

Here **key** can be a dot separated path in the configuration json file.
Example:

```bash
php configure update database.host 127.0.0.1
```

---

## Direct Class usage

### 1. Generate new or Update the existing configuration by loading one or more files

Use the following command: **php configure generate file_path1 [file_path2] [file_path3] ...**

**Note**: Can accept json & yaml files only
```php
$generate = new Generate();
$generate->create(['fixtures/config.invalid.json','fixtures/sample1.yaml']);
```

### 2. Read the configuration using dot notation

To read the value from the configuration we can Use the following command: **php configure read [key1].[key2].[...]**.

Here **key** can be a dot separated path in the configuration json file.

```php
$reader = new Read();
$reader->get('database.host');
```

### 3. Update the configuration using dot notation

To update the value of a key in the configuration we can Use the following command: \*\*php configure update key <value>

Here **key** can be a dot separated path in the configuration json file

```php
$updater = new Update();
$updater->set('database.host',$value);
```
