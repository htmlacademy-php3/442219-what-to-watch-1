<?php

namespace App\Http\Responses;

use Illuminate\Pagination\AbstractPaginator;

class PaginatedResponse extends BaseResponse
{

    /**
     * The formation of the content of the response with pagination.
     *
     * @return array
     */
    protected function makeResponseData(): array
    {
        if ($this->data instanceof AbstractPaginator) {
            $this->data = $this->data->toArray();
        }

        return $this->prepareData();
    }
}
