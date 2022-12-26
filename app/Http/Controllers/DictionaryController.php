<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DictionaryCreateRequest;
use App\Models\Dictionary;
use Exception;
use Illuminate\Http\JsonResponse;

final class DictionaryController extends RestController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->getSuccessResponse(
            Dictionary::orderBy('name')
                ->limit(10)
                ->get()
                ->toArray()
        );
    }

    /**
     * @param Dictionary $dictionary
     * @return JsonResponse
     */
    public function show(Dictionary $dictionary): JsonResponse
    {
        return $this->getSuccessResponse(
            $dictionary
                ->words()
                ->orderBy('name')
                ->limit(20)
                ->get()
                ->toArray()
        );
    }

    /**
     * @param DictionaryCreateRequest $request
     *
     * @return JsonResponse
     */
    public function store(DictionaryCreateRequest $request): JsonResponse
    {
        try {
            $dictionary = Dictionary::create($request->validated());

            return $this->getSuccessResponse($dictionary->toArray());
        } catch (Exception $exception) {
            report($exception);

            return $this->getErrorResponse();
        }
    }

    /**
     * @param Dictionary $dictionary
     * @return JsonResponse
     */
    public function destroy(Dictionary $dictionary): JsonResponse
    {
        try {
            $dictionary->delete();

            return $this->getSuccessResponse();
        } catch (Exception $exception) {
            report($exception);

            return $this->getErrorResponse();
        }
    }
}
