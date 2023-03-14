<?php

namespace App\Services\Apple\Providers;

use App\Services\Apple\Itunes\Interfaces\ItunesSongRepositoryInterface;
use App\Services\Apple\Itunes\Repositories\ItunesSongRepository;
use Illuminate\Support\ServiceProvider;

class AppleServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ItunesSongRepositoryInterface::class => ItunesSongRepository::class,
    ];

    public function boot(): void
    {
        //
    }
}
