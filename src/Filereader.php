<?php
/**
 * Created by PhpStorm.
 * User: f1r3starter
 * Date: 06.07.18
 * Time: 13:46
 */

namespace app;

class Filereader
{
    private $file;

    /**
     * Filereader constructor.
     * @param $file
     */
    public function __construct($file)
    {
        if (!file_exists($file)) {
            throw new \InvalidArgumentException('File does not exists');
        }
        $this->file = $file;
    }

    /**
     * Returns the file contents
     *
     * @return bool|string
     */
    public function read(): string
    {
        return file_get_contents($this->file);
    }
}