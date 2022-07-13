<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccesResponse;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    /**
     * User Logout.
     *
     * @api {post} /api/login
     *
     * @param  int  $idUser
     * @return SuccesResponse|Response
     */
    public function destroy(int $idUser): SuccesResponse|Response
    {
        // Уничтожение токена пользовательской аутентификации.
        // HTTP_OK
        return new SuccesResponse();
    }
}
