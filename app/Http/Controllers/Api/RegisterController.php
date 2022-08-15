<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Responses\SuccesResponse;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /**
     * Registers a new user.
     *
     * @param UserRequest $request
     * @return SuccesResponse|Response
     * @api {post} /api/register
     *
     */
    public function store(UserRequest $request): SuccesResponse|Response
    {
        // Валидация полученных полей (Имя, email, пароль и подтверждение пароля).
        // Проверка наличия обязательных полей и соответствия заданным правилам.
        // Проверка, что указанный email не занят.
        // Сохранение данных в БД, или возвращение списка ошибок при их наличии.
        // Сохранение аватара в публичное хранилище и указание ссылки на файл в таблице пользователей.
        // Возвращение токена для аутентификации пользователя под зарегистрированной учетной записью.
        // HTTP_OK
        $params = $request->safe()->except('file');
        $user = User::create($params);
        $token = $user->createToken('auth-token');

        return new SuccesResponse([
            'user' => $user,
            'token' => $token->plainTextToken,
        ], 201);
    }


}
