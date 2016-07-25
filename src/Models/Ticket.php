<?php 
/*
 * BeMyGuestSuppliersAPIV1Lib
 *
 * This file was automatically generated for BeMyGuest by APIMATIC v2.0 ( https://apimatic.io ) on 07/25/2016
 */

namespace BeMyGuestSuppliersAPIV1Lib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Ticket implements JsonSerializable {
    /**
     * Status of the ticket - unused | used | invalid
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Value of the ticket number
     * @required
     * @var string $value public property
     */
    public $value;

    /**
     * @todo Write general description for this property
     * @var string $updatedAt public property
     */
    public $updatedAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $status      Initialization value for the property $this->status   
     * @param   string            $value       Initialization value for the property $this->value    
     * @param   string            $updatedAt   Initialization value for the property $this->updatedAt
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->status    = func_get_arg(0);
            $this->value     = func_get_arg(1);
            $this->updatedAt = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['status']    = $this->status;
        $json['value']     = $this->value;
        $json['updatedAt'] = $this->updatedAt;

        return $json;
    }
}