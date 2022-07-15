<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

class FailValidationResponse extends BaseResponse
{
    protected ?string $message;

    /**
     * ExceptionResponse constructor.
     *
     * @param $data
     * @param string $message
     * @param int $code
     */
    public function __construct(
        $data,
        string $message = 'Переданные данные не корректны.',
        int $code = Response::HTTP_UNPROCESSABLE_ENTITY
    ) {
        $this->message = $message;

        parent::__construct([], $code);
    }

    /**
     * Forming the content of the response.
     *
     * @return array
     */
    protected function makeResponseData(): array
    {
        return [
            'message' => $this->message,
            'errors' => $this->prepareData(),
        ];
    }
}
