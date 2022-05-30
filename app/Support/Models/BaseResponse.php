<?php


namespace App\Support\Models;


use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class BaseResponse extends Model
{
    protected string $message;
    protected string | array $details = '';
    protected mixed $data;
    protected int $statusCode = 200;

    #[Pure] public static function builder (): static
    {
        return new BaseResponse();
    }

    /**
     * @param string $message
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param mixed $data
     * @return static
     */
    public function setData(mixed $data): static
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param int $statusCode
     * @return static
     */
    public function setStatusCode(int $statusCode = Response::HTTP_OK): static
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param string|array $details
     * @return static
     */
    public function setDetails(string | array $details): static
    {
        $this->details = $details;
        return $this;
    }

    public function toArray (): array
    {
        $response = ['message' => $this->message, 'data' => []];
        if (isset($this->data) && $this->data !== null):
            $dataType = gettype($this->data);
            if (!in_array($dataType, ['array', 'integer', 'string', 'boolean'])) {
                $this->data = $this->data->toArray();
            }
            $response['data'] = $this->data;
        endif;
        $response['details'] = $this->details;
        $response['statusCode'] = $this->statusCode;
        return $response;
    }

    public function response(): Response
    {
        return response()->json($this->toArray(), $this->statusCode);
//        echo json_encode(
//            $this->toArray()
//        );
//        header('Content-Type: application/json');
//        http_response_code($this->statusCode);
//        exit;
    }
}
