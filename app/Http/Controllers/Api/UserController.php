<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\SuccesResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $userModel;

    /**
     * UserController constructor.
     *
     * @param $userModel
     */
    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Getting a user profile.
     *
     * @api {get} /api/user
     *
     * @param  int  $id ID user
     * @return SuccesResponse|Response
     */
    public function show(int $id): SuccesResponse|Response
    {
        // чтение в БД информации о текущем пользователе
        // возвращает информацию о пользователе: имя, email, аватар и роль пользователя.
        // HTTP_OK
        return new SuccesResponse();
    }

    /**
     * Updating the user profile.
     *
     * @api {patch} /api/user
     *
     * @param  Request  $request
     * @param  int  $id
     * @return SuccesResponse|Response
     */
    public function update(Request $request, int $id): SuccesResponse|Response
    {
        // валидация формы
        // если не успешно, то возвращаем ошибка валидации
        // успешно - запись в БД
        // если не успешно, то возвращаем ошибка записи в БД...
        // успешная запись - успешный ответ
        // HTTP_ACCEPTED
        return new SuccesResponse();
    }
}
