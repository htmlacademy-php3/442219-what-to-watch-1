<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreUpdateRequest;
use App\Models\Genre;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    /**
     * Getting a list of genres.
     *
     * @api {get} /api/genres
     *
     * @return JsonResponse|Responsable
     */
    public function index(): JsonResponse|Responsable
    {
        return $this->success(Genre::all());
    }

    /**
     * Genre Editing.
     *
     * @param GenreUpdateRequest $request
     * @param Genre $genre
     * @return JsonResponse|Responsable
     * @api {patch} /api/genres/{genre}
     */
    public function update(GenreUpdateRequest $request, Genre $genre): JsonResponse|Responsable
    {
        $genre->update($request->validated());

        return $this->success($genre->fresh());
    }
}
