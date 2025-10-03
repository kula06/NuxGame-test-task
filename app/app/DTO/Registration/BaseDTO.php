<?php

namespace App\DTO\Registration;

use Illuminate\Http\Request;

abstract readonly class BaseDTO
{
    public static function fromRequest(Request $request): static
    {
        return new static(...$request->validated());
    }
}
