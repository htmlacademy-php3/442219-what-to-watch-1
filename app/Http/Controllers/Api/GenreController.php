<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends Controller
{
    /**
     * Getting a list of genres.
     *
     * @api {get} /api/genres
     *
     * @return SuccesResponse|Response
     */
    public function index(): SuccesResponse|Response
    {
        return new SuccesResponse();
    }

    /**
     * Genre Editing.
     *
     * @api {patch} /api/genres/{genre}
     *
     * @param  Request  $request
     * @param  string  $genre
     * @return SuccesResponse|Response
     */
    public function update(Request $request, string $genre): SuccesResponse|Response
    {
        // Метод доступен только аутентифицированному пользователю с ролью модератор.
        return new SuccesResponse();
    }
}
