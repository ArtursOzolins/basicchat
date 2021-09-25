<?php

namespace App;

use League\Csv\Reader;

class HistoryView
{
    private string $saveFile;

    public function __construct(string $saveFile)
    {
        $this->saveFile = $saveFile;
    }

    public function getRecords()
    {
        return Reader::createFromPath($this->saveFile, 'r')->getRecords();
    }
}
