<?php

namespace App\Services\Apple\Itunes\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;

class EmptySearchTermException extends Exception
{
    public function validationException(): ValidationException
    {
        return ValidationException::withMessages([
            'name' => 'Empty song name',
        ]);
    }
}
