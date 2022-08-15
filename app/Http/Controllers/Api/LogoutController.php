<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    /**
     * User Logout.
     *
     * @return SuccesResponse|Response
     * @api {post} /api/login
     *
     */
    public function logout(): SuccesResponse|Response
    {
        // Уничтожение токена пользовательской аутентификации.
        // HTTP_OK
        Auth::user()->tokens()->delete();

        return new SuccesResponse(null, 204);
    }
}
