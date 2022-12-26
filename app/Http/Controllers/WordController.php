<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WordCreateRequest;
use App\Models\Word;
use App\Services\Dictionary as DictionaryService;
use App\Models\Dictionary;
use App\Services\WordDefinition;
use Exception;
use Illuminate\Http\JsonResponse;

final class WordController extends RestController
{
    /**
     * @param WordDefinition $definition
     * @param DictionaryService $dictionaryService
     */
    public function __construct(
        private WordDefinition    $definition,
        private DictionaryService $dictionaryService
    )
    {
    }

    /**
     * @param WordCreateRequest $request
     * @return JsonResponse
     */
    public function store(WordCreateRequest $request): JsonResponse
    {
        $word = $request->validated()['name'];

        $definition = $this->definition->getDefinition($word);
        //$definition['title'] костыль
        if (isset($definition['title'])) {
            return $this->getErrorResponse($definition);
        }

        try {
            $word = new Word;
            $word->name = $request->validated()['name'];
            $word->definition = json_encode($definition);
            $word->save();

            return $this->getSuccessResponse($word->toArray());
        } catch (Exception $exception) {
            report($exception);

            return $this->getErrorResponse();
        }
    }

    /**
     * @param Word $word
     * @return JsonResponse
     */
    public function destroy(Word $word): JsonResponse
    {
        try {
            $word->delete();

            return $this->getSuccessResponse();
        } catch (Exception $exception) {
            report($exception);

            return $this->getErrorResponse();
        }
    }

    /**
     * @param Dictionary $dictionary
     * @param Word $word
     * @return JsonResponse
     */
    public function setWord(Dictionary $dictionary, Word $word): JsonResponse
    {
        try {
            $result = $this->dictionaryService->setWord($dictionary, $word);

            return $this->getSuccessResponse($result->toArray());
        } catch (Exception $exception) {
            report($exception);

            return $this->getErrorResponse(['message' => $exception->getMessage()]);
        }
    }

    /**
     * @param Word $word
     * @return JsonResponse
     */
    public function unsetWord(Word $word): JsonResponse
    {
        try {
            $result = $this->dictionaryService->unsetWord($word);

            return $this->getSuccessResponse($result->toArray());
        } catch (Exception $exception) {
            report($exception);

            return $this->getErrorResponse();
        }
    }
}
