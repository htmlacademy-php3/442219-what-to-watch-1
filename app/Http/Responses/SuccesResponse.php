<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

class SuccesResponse extends BaseResponse
{

    /**
     * Forming the content of the response.
     *
     * @return array
     */
    protected function makeResponseData(): array
    {
        return $this->prepareData();
    }
}
