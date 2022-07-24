<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PromoController extends Controller
{
    /**
     * Getting a promo movie.
     *
     * @api {get} /api/promo
     *
     * @return SuccesResponse|Response
     */
    public function index(): SuccesResponse|Response
    {
        // возвращает фильм, являющийся продвигаемым на данный момент (promo)
        return new SuccesResponse();
    }

    /**
     * Installing a promo movie.
     *
     * @api {get} /api/promo/{id}
     *
     * @param  Request  $request
     * @param  int $id ID film
     * @return SuccesResponse|Response
     */
    public function store(Request $request, int $id): SuccesResponse|Response
    {
        // Метод доступен только аутентифицированному пользователю с ролью модератор.
        // При отсутствии запрошенного фильма в базе - ошибка 404 (HTTP_NOT_FOUND).
        return new SuccesResponse();
    }
}
