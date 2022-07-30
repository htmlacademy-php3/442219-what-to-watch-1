<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Adding a review to a movie.
     *
     * @api {post} /api/films/{id}/comments
     *
     * @param  Request  $request
     * @param  int  $id ID film
     * @return SuccesResponse|Response
     */
    public function store(Request $request, int $id): SuccesResponse|Response
    {
        // Комментарий может быть добавлен отдельно, так и в ответ на другой,
        // в этом случае в теле запроса указывается и comment_id.
        // Добавление отзыва сопровождается выставлением оценки.
        return new SuccesResponse();
    }

    /**
     * Getting a list of movie reviews.
     *
     * @api {get} /api/films/{id}/comments
     *
     * @param  int  $id ID film
     * @return SuccesResponse|Response
     */
    public function show(int $id): SuccesResponse|Response
    {
        // Возвращает список отзывов.
        // Каждый отзыв содержит: текст отзыва, имя автора, дату написания отзыва.
        // Так же может содержать оценку.
        // добавление к несуществующему фильму - ошибка 404 (HTTP_NOT_FOUND).
        return new SuccesResponse();
    }

    /**
     * Editing a comment.
     *
     * @api {patch} /api/comments/{comment}
     *
     * @param  Request  $request
     * @param  int  $id ID comment
     * @return SuccesResponse|Response
     */
    public function update(Request $request, int $id): SuccesResponse|Response
    {
        // Пользователь может отредактировать свой комментарий.
        // Модератор может отредактировать любой комментарий
        return new SuccesResponse();
    }

    /**
     * Deleting a comment.
     *
     * @api {delete} /api/comments/{comment}
     *
     * @param  int  $id ID comment
     * @return SuccesResponse|Response
     */
    public function destroy(int $id): SuccesResponse|Response
    {
        // Пользователь может удалить свой комментарий.
        // Модератор может удалить любой комментарий
        return new SuccesResponse();
    }
}
