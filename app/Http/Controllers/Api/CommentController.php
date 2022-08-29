<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentAddRequest;
use App\Models\Comment;
use App\Models\Film;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Adding a review to a movie.
     *
     * @param CommentAddRequest $request
     * @param int $id ID film
     * @return JsonResponse|Responsable
     * @api {post} /api/films/{id}/comments
     *
     */
    public function store(CommentAddRequest $request, int $id): JsonResponse|Responsable
    {
        // Комментарий может быть добавлен отдельно, так и в ответ на другой, TODO Delete Comments
        // в этом случае в теле запроса указывается и comment_id.
        // Добавление отзыва сопровождается выставлением оценки.
        // добавление к несуществующему фильму - ошибка 404 (HTTP_NOT_FOUND).
        // Метод доступен только аутентифицированному пользователю.
        $film = Film::find($id);

        $film->comments()->create([
//            'comment_id' => $request->comment,
            'text' => $request->text,
            'user_id' => Auth::id(),
        ]);

        return $this->success(null, 201);
    }

    /**
     * Getting a list of movie reviews.
     *
     * @api {get} /api/films/{id}/comments
     *
     * @param  int  $id ID film
     * @return JsonResponse|Responsable
     */
    public function show(int $id): JsonResponse|Responsable
    {
        // Возвращает список отзывов.   TODO Delete Comments
        // Каждый отзыв содержит: текст отзыва, имя автора, дату написания отзыва.
        // Так же может содержать оценку.
        $film = Film::find($id);

        return $this->success([
            'count' => $film->comments()->count(),
            'comments' => $film->comments,
        ]);
    }

    /**
     * Editing a comment.
     *
     * @api {patch} /api/comments/{comment}
     *
     * @param  Request  $request
     * @param  int  $id ID comment
     * @return JsonResponse|Responsable
     */
    public function update(Request $request, int $id): JsonResponse|Responsable
    {
        // Пользователь может отредактировать свой комментарий. TODO Delete Comments
        // Модератор может отредактировать любой комментарий
        return $this->success();
    }

    /**
     * Deleting a comment.
     *
     * @param Comment $comment
     * @return JsonResponse|Responsable
     * @api {delete} /api/comments/{comment}
     *
     */
    public function destroy(Comment $comment): JsonResponse|Responsable
    {
        // Пользователь может удалить свой комментарий. TODO Delete Comments
        // Модератор может удалить любой комментарий
        $comment->delete();

        return $this->success(null, 201);
    }
}
