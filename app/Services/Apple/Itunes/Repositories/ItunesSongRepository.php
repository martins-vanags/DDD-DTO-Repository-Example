<?php

namespace App\Services\Apple\Itunes\Repositories;

use App\Services\Apple\DataTransferObjects\Song;
use App\Services\Apple\Itunes\Interfaces\ItunesSongRepositoryInterface;
use App\Services\Apple\ItunesSongs;
use Throwable;

class ItunesSongRepository implements ItunesSongRepositoryInterface
{
    /**
     * @throws Throwable
     */
    public function find(Song $song): array
    {
        return ItunesSongs::make()
            ->name($song->name)
            ->find();
    }
}
