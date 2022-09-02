<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    /**
     * Getting a user profile.
     *
     * @api {get} /api/user
     *
     * @param  int  $id ID user
     * @return JsonResponse|Responsable
     */
    public function show(int $id): JsonResponse|Responsable
    {
        // чтение в БД информации о текущем пользователе
        // возвращает информацию о пользователе: имя, email, аватар и роль пользователя.
        // HTTP_OK
        return $this->success();
    }

    /**
     * Updating the user profile.
     *
     * @api {patch} /api/user
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse|Responsable
     */
    public function update(Request $request, int $id): JsonResponse|Responsable
    {
        // валидация формы
        // если не успешно, то возвращаем ошибка валидации
        // успешно - запись в БД
        // если не успешно, то возвращаем ошибка записи в БД...
        // успешная запись - успешный ответ
        // HTTP_ACCEPTED
        return $this->success();
    }
}
