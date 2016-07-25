<?php
/*
 * BeMyGuestSuppliersAPIV1Lib
 *
 * This file was automatically generated for BeMyGuest by APIMATIC v2.0 ( https://apimatic.io ) on 07/25/2016
 */

namespace BeMyGuestSuppliersAPIV1Lib;

use BeMyGuestSuppliersAPIV1Lib\Controllers;

/**
 * BeMyGuestSuppliersAPIV1Lib client class
 */
class BeMyGuestSuppliersAPIV1Client
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct($xAuthorization = NULL)
    {
        Configuration::$xAuthorization = $xAuthorization ? $xAuthorization : Configuration::$xAuthorization;
    }
 
    /**
     * Singleton access to API controller
     * @return Controllers\APIController The *Singleton* instance
     */
    public function getClient()
    {
        return Controllers\APIController::getInstance();
    }
}