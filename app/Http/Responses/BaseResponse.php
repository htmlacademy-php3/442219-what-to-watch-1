<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseResponse implements Responsable
{
    protected mixed $data;
    protected int $statusCode;

    public function __construct(mixed $data = [], int $statusCode = Response::HTTP_OK)
    {
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param Request $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        return response()->json($this->makeResponseData(), $this->statusCode);
    }

    /**
     * Converting the returned data to an array.
     *
     * @return array
     */
    protected function prepareData(): array
    {
        if ($this->data instanceof Arrayable) {
            return $this->data->toArray();
        }

        return $this->data;
    }

    /**
     * Formation of the response content.
     *
     * @return array|null
     */
    abstract protected function makeResponseData(): ?array;
}
