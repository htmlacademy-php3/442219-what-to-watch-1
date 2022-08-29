<?php

namespace App\Http\Controllers;

use App\Http\Responses\PaginatedResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Responses\SuccessResponse;
use Symfony\Component\HttpFoundation\Response;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Receives a successful response.
     *
     * @param $data
     * @param int|null $code
     * @return SuccessResponse
     */
    protected function success($data, ?int $code = Response::HTTP_OK): SuccessResponse
    {
        return new SuccessResponse($data, $code);
    }

    /**
     * Receives a successful response with pagination.
     *
     * @param $data
     * @param int|null $code
     * @return PaginatedResponse
     */
    protected function successPaginate($data, ?int $code = Response::HTTP_OK): PaginatedResponse
    {
        return new PaginatedResponse($data, $code);
    }
}
