<?php

namespace Saadj55\LaravelPubg\Exceptions;


class AccessTokenNotFoundException extends \Exception{

    protected $statusCode = 500;

    public function __construct($message = 'An error occurred', $statusCode = null)
    {
        parent::__construct($message);

        if (! is_null($statusCode)) {
            $this->setStatusCode($statusCode);
        }
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}