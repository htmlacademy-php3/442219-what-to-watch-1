<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavoriteController extends Controller
{
    /**
     * Getting a list of favorite movies.
     *
     * @api {get} /api/favorite
     *
     * @return SuccesResponse|Response
     */
    public function index(): SuccesResponse|Response
    {
        // Метод возвращает список фильмов, добавленных пользователем в избранное.
        return new SuccesResponse();
    }

    /**
     * Adding a movie to favorites.
     *
     * @api {get} /api/films/{id}/favorite
     *
     * @param  Request  $request
     * @param  int  $idFilm
     * @return SuccesResponse|Response
     */
    public function store(Request $request, int $idFilm): SuccesResponse|Response
    {
        // добавления несуществующего фильма - ошибка 404 (HTTP_NOT_FOUND)
        // попытка добавления в избранное фильма который уже присутствует
        // в списке пользователя — ошибка 422 (HTTP_UNPROCESSABLE_ENTITY),
        // с соответствующим сообщением (message).
        return new SuccesResponse();
    }

    /**
     * Deleting a movie from favorites.
     *
     * @api {delete} /api/films/{id}/favorite
     *
     * @param  int  $idFilm
     * @return SuccesResponse|Response
     */
    public function destroy(int $idFilm): SuccesResponse|Response
    {
        // попытка удаления несуществующего фильма - ошибка 404.
        // попытка удаления фильма который отсутствует в списке пользователя — ошибка 422,
        // с соответствующим сообщением (message).
        return new SuccesResponse();
    }
}
