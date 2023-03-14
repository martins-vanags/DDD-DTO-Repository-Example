<?php

namespace App\Services\Apple\DataTransferObjects;

class SongData
{
    public function __construct(public string $name, public string $artist, public string $url)
    {
    }
}
