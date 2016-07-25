<?php
/*
 * BeMyGuestSuppliersAPIV1Lib
 *
 * This file was automatically generated for BeMyGuest by APIMATIC v2.0 ( https://apimatic.io ) on 07/25/2016
 */

namespace BeMyGuestSuppliersAPIV1Lib;

use Exception;

/**
 * Class for exceptions when there is a network error, status code error, etc.
 */
class APIException extends Exception {
    /**
     * HTTP status code
     * @var int
     */
    private $responseCode;

    /**
     * Response body
     * @var mixed
     */
    private $responseBody;
    
    /**
     * The HTTP response code from the API request
     * @param string $reason the reason for raising an exception
     * @param int $responseCode the HTTP response code from the API request
     * @param string $responseBody the HTTP response body from the API request
     */
    public function __construct($reason, $responseCode, $responseBody)
    {
        parent::__construct($reason, $responseCode, NULL);
        $this->responseCode = $responseCode;
        $this->responseBody = $responseBody;
    }

    /**
     * The HTTP response code from the API request
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * The HTTP response body from the API request
     * @return mixed
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * The reason for raising an exception
     * @return string
     */
    public function getReason()
    {
        return $this->message;
    }
}