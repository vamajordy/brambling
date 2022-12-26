<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

final class WordDefinition
{
    const API_URL = 'https://api.dictionaryapi.dev/api/v2/entries/en/';

    /**
     * @param string $word
     * @return array
     */
    public function getDefinition(string $word): array
    {
        return Http::get(self::API_URL . $word)->json();
    }
}
