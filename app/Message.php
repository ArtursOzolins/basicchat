<?php

namespace App;

use League\Csv\Writer;

class Message
{
    private string $name;
    private string $message;
    private string $saveFile;

    public function __construct(string $name, string $message, string $saveFile)
    {
        $this->name = $name;
        $this->message = $message;
        $this->saveFile = $saveFile;
        $writer = Writer::createFromPath($this->saveFile, 'a+');
        $writer->insertOne([$this->name, $this->message]);
    }
}
