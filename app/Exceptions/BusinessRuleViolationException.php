<?php


namespace App\Exceptions;


use App\Support\Models\BaseResponse;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class BusinessRuleViolationException extends SystemDefaultException
{

    /**
     * BadRequestException constructor.
     */
    private mixed $data;
    #[Pure] public function __construct(string $message, mixed $data = '')
    {
        $this->message = $message;
        $this->data = $data;
        parent::__construct($message);
    }

    function response(): Response
    {
        return BaseResponse::builder()
            ->setStatusCode(Response::HTTP_CONFLICT)
            ->setMessage($this->message)
            ->setData($this->data)
            ->response()
        ;
    }

    function getLogInfo(): string
    {
        return '';
    }
}
