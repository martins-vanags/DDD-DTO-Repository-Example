<?php

namespace App\Services\Apple\Itunes\Interfaces;

use App\Services\Apple\DataTransferObjects\Song;

interface ItunesSongRepositoryInterface
{
    public function find(Song $song): array;
}
