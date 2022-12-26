<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\WordLimitMailable;
use App\Models\Word;
use App\Models\Dictionary as DictionaryModel;
use Exception;
use Illuminate\Support\Facades\Mail;

final class Dictionary
{
    const DICTIONARY_LIMIT = 2; // for simple test

    /**
     * @param DictionaryModel $dictionary
     * @param Word $word
     * @return Word
     * @throws Exception
     */
    public function setWord(DictionaryModel $dictionary, Word $word): Word
    {
        if (count($dictionary->words) < self::DICTIONARY_LIMIT) {
            $word->dictionary_id = $dictionary->id;
            $word->save();

            return $word;
        }

        Mail::to(env('MAIL_ADMIN_ADDRESS'))->send(new WordLimitMailable());

        throw new Exception('You can add only ' . self::DICTIONARY_LIMIT . ' to the dictionary');
    }

    /**
     * @param Word $word
     * @return Word
     */
    public function unsetWord(Word $word): Word
    {
        $word->dictionary_id = null;
        $word->save();

        return $word;
    }
}
