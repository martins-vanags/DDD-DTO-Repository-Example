<?php

namespace App\Services\Apple\Itunes;

use App\Services\Apple\DataTransferObjects\SongData;
use App\Services\Apple\Itunes\Exceptions\EmptySearchTermException;
use App\Services\Apple\Itunes\Exceptions\ItunesApiErrorException;
use Illuminate\Support\Facades\Http;
use Throwable;
use Symfony\Component\HttpFoundation\Response as Status;


class ItunesService
{
    /**
     * @throws Throwable
     */
    public function search(string $name): array
    {
        throw_if(empty($name), new EmptySearchTermException());

        $response = Http::withoutVerifying()->get('https://itunes.apple.com/search/?term=' . $name . '&limit=10');

        throw_if($response->failed(), new ItunesApiErrorException($response->body()));

        $results = collect($response->json('results'))->map(function ($item) {
            $trackName = $item['trackName'] ?? '';
            $artistName = $item['artistName'] ?? '';
            $url = $item['previewUrl'] ?? '';

            return new SongData($trackName, $artistName, $url);
        })->toArray();

        return [
            'status' => Status::HTTP_OK,
            'results' => $results,
        ];
    }

}
