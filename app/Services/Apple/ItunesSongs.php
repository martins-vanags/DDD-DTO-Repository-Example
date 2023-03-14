<?php


namespace App\Services\Apple;

use App\Services\Apple\Itunes\Exceptions\ItunesApiErrorException;
use App\Services\Apple\Itunes\Exceptions\EmptySearchTermException;
use App\Services\Apple\Itunes\ItunesService;
use Throwable;

class ItunesSongs
{
    public string $name;

    public static function make(): self
    {
        return new static;
    }

    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @throws Throwable
     */
    public function find(): array
    {
        try {
            $response = (new ItunesService())->search($this->name);
        } catch (EmptySearchTermException $exception) {
            throw $exception->validationException();
        } catch (ItunesApiErrorException $exception) {
            abort(500, $exception->getMessage());
        }

        return $response;
    }
}
