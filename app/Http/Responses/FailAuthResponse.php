<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

class FailAuthResponse extends BaseResponse
{

    protected string $message;

    /**
     * ExceptionResponse constructor.
     *
     * @param string $message
     * @param int $code
     */
    public function __construct(
        string $message = 'Запрос требует аутентификации.',
        int $code = Response::HTTP_UNAUTHORIZED
    ) {
        $this->message = $message;

        parent::__construct([], $code);
    }

    /**
     * Formation of the response content.
     *
     * @return array
     */
    protected function makeResponseData(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}
