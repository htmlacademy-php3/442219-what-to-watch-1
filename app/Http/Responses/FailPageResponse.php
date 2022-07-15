<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

class FailPageResponse extends BaseResponse
{
    protected string $message;

    /**
     * ExceptionResponse constructor.
     *
     * @param string $message
     * @param int $code
     */
    public function __construct(
        string $message = 'Запрашиваемая страница не существует.',
        int $code = Response::HTTP_NOT_FOUND
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
