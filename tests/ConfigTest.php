<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Configuration\Generate;
use Configuration\Helper;
use Configuration\Read;

final class ConfigTest extends TestCase
{
    public function testFolderExists(): void
    {
        $this->assertFileExists(Helper::CONFIG_FOLDER_PATH);
    }

    /**
     * @depends testFolderExists
     */
    public function testFolderWritable(): void
    {
        $this->assertIsWritable(Helper::CONFIG_FOLDER_PATH);
    }

    /**
     * @depends testFolderWritable
     */
    public function testFolderReadable(): void
    {
        $this->assertIsReadable(Helper::CONFIG_FOLDER_PATH);
    }

    /**
     * @depends testFolderWritable
     */

    public function testGenerateConfig(): void
    {
        $generate = new Generate();

        $this->assertIsNumeric($generate->create(['files/file1.json']));
    }

    /**
     * @depends testFolderReadable
     */
    public function testReadConfig(): void
    {
        $reader = new Read();

        $this->assertNotNull($reader->get(['id']));
    }
}