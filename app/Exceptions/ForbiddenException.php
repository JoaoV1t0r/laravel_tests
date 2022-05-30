<?php


namespace App\Exceptions;


use App\Support\Models\BaseResponse;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class ForbiddenException extends SystemDefaultException
{

    /**
     * ForbiddenException constructor.
     */
    #[Pure] public function __construct(string $message = '')
    {
        parent::__construct($message);
    }

    function response(): Response
    {
        $message = $this->message === ''
            ? 'Esse usuário não tem as permissões necessárias para realizar essa operação.'
            : $this->message
        ;
        return BaseResponse::builder()
            ->setStatusCode(Response::HTTP_FORBIDDEN)
            ->setMessage($message)
            ->response()
        ;
    }

    function getLogInfo(): string
    {
        return '';
    }
}
