<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /**
     * Registers a new user.
     *
     * @api {post} /api/register
     *
     * @param  Request  $request
     * @return SuccesResponse|Response
     */
    public function store(Request $request): SuccesResponse|Response
    {
        // Валидация полученных полей (Имя, email, пароль и подтверждение пароля).
        // Проверка наличия обязательных полей и соответствия заданным правилам.
        // Проверка, что указанный email не занят.
        // Сохранение данных в БД, или возвращение списка ошибок при их наличии.
        // Сохранение аватара в публичное хранилище и указание ссылки на файл в таблице пользователей.
        // Возвращение токена для аутентификации пользователя под зарегистрированной учетной записью.
        // HTTP_OK
        return new SuccesResponse();
    }
}
