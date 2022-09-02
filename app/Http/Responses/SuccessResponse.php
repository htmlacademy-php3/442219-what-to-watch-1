<?php

namespace App\Http\Responses;

class SuccessResponse extends BaseResponse
{

    /**
     * Forming the content of the response.
     *
     * @return array|null
     */
    protected function makeResponseData(): ?array
    {
        return $this->data ? [
            'data' => $this->prepareData(),
        ] : null;
    }
}
