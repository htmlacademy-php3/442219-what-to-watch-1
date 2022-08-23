<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    protected $filmModel;

    /**
     * FilmController constructor.
     *
     * @param $filmModel
     */
    public function __construct($filmModel)
    {
        $this->filmModel = $filmModel;
    }

    // TODO add a method for calculating the rating of a movie

    /**
     * Getting a list of movies.
     *
     * @api {get} /api/films
     *
     * @return SuccesResponse|Response
     */
    public function index(): SuccesResponse|Response
    {
        // возвращает первые 8 фильмов плюс пагинация если требуется.
        // HTTP_OK
        return new SuccesResponse();
    }

    /**
     * Adding a movie to the database.
     *
     * @api {post} /api/films
     *
     * @param  Request  $request
     * @return SuccesResponse|Response
     */
    public function store(Request $request): SuccesResponse|Response
    {
        // добавляет информацию о фильме в базу данных.
        //
        // При заполнении поля imdb_id и наличии фильма с таким id в базе — возвращается ошибка валидации 422:
        // HTTP_UNPROCESSABLE_ENTITY
        // Или все ОК - HTTP_OK
        // При сохранении проверяем наличие связанных жанров и создаем при отсутствии.
        return new SuccesResponse();
    }

    /**
     * Getting information about the movie.
     *
     * @api {get} /api/films/{id}
     *
     * @param  int  $id ID film
     * @return SuccesResponse|Response
     */
    public function show(int $id): SuccesResponse|Response
    {
        // возвращает информацию о фильме.
        // если фильм не существует 404:
        // HTTP_NOT_FOUND
        // Или все ОК - HTTP_OK
        return new SuccesResponse();
    }

    /**
     * Editing a movie.
     *
     * @api {patch} /api/films/{id}
     *
     * @param  Request  $request
     * @param  int  $id ID film
     * @return SuccesResponse|Response
     */
    public function update(Request $request, int $id): SuccesResponse|Response
    {
        // используется как часть функциональности формы добавления фильма в базу.
        // Метод доступен только аутентифицированному пользователю с ролью модератор.
        // Валидация формы редактирорвания.
        // При отсутствии запрошенного в роуте фильма в базе, возвращается 404 ошибка:
        // HTTP_NOT_FOUND
        // Или все ОК - HTTP_OK
        return new SuccesResponse();
    }

    /**
     * Getting a list of similar movies
     *
     * @api {get} /api/films/{id}/similar
     *
     * @param int $id ID film
     * @return SuccesResponse|Response
     */
    public function getSimilar(int $id): SuccesResponse|Response
    {
        // метод возвращает список из 4 подходящих фильмов.
        // Похожесть определяется принадлежностью к тем же жанрам,
        // что и исходный фильм (любым из имеющихся).
        // HTTP_OK
        return new SuccesResponse();
    }
}
