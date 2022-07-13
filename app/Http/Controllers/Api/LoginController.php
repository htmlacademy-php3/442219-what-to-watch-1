<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * User authentication.
     *
     * @api {post} /api/login
     *
     * @param  Request  $request
     * @return SuccesResponse|Response
     */
    public function store(Request $request): SuccesResponse|Response
    {
        // Валидация полученных полей (email, пароль).
        // Возвращение токена для аутентификации пользователя.
        // HTTP_OK
        return new SuccesResponse();
    }
}
