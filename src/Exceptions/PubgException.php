<?php
/**
 *  Laravel Package for PUBG API
 *
 *  Documentation : https://github.com/saadj55/laravel-pubg
 *
 *  Read the README, and the contributing guidelines to contribute to this project.
 *
 *  - Saad Nasir Siddique <saadj55@gmail.com> : https://github.com/saadj55
 */
namespace Saadj55\LaravelPubg\Exceptions;


class PubgException extends \Exception{

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