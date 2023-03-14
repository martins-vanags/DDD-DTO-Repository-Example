<?php

namespace App\Domains\Songs\Controllers;

use App\Services\Apple\DataTransferObjects\Song;
use App\Services\Apple\Itunes\Interfaces\ItunesSongRepositoryInterface;
use Illuminate\Http\Request;

class SongController
{
    public function __construct(public ItunesSongRepositoryInterface $itunesSongRepository)
    {
    }

    public function show(Request $request)
    {
        $name = $request->get('name');

        $response = $this->itunesSongRepository->find(new Song($name));

        return response()->json([
            'results' => $response['results'],
        ], $response['status']);
    }
}
