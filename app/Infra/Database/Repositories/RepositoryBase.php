<?php


namespace App\Infra\Database\Repositories;


use App\Exceptions\DatabaseConnectionException;
use App\Exceptions\DatabasePersistenceException;
use App\Exceptions\HttpInternalErrorException;
use App\Exceptions\SystemDefaultException;
use App\Infra\Database\Config\DbBase;
use Exception;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RepositoryBase extends DbBase
{
    /**
     * @throws DatabasePersistenceException
     * @throws DatabaseConnectionException
     */
    protected function validatePersistenceErrors(QueryException $queryException, array $rules = [])
    {
        if ($queryException->getCode() === 1045):
           throw new DatabaseConnectionException();
        endif;
        Log::error($queryException->getMessage());
        $exceptionError = $queryException->getMessage();
        $errors = [];
        foreach ($rules as $key => $validation):
            if (str_contains($exceptionError, $key)):
                $errors[$validation[0]] = $validation[1];
            endif;
        endforeach;
        if (count($errors) > 0):
            throw new DatabasePersistenceException($errors, $queryException->getMessage());
        endif;
    }

    /**
     * @throws HttpInternalErrorException
     */
    public function returnError(SystemDefaultException $exception)
    {
        throw new HttpInternalErrorException($exception->getMessage());
    }
}
