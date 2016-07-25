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
class GetTicketStatusResponse extends BaseResponse implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var Ticket[] $date public property
     */
    public $date;

    /**
     * Constructor to set initial or default values of member properties
     * @param   array             $date   Initialization value for the property $this->date
     */
    public function __construct()
    {
        if(1 == func_num_args())
        {
            $this->date = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['date'] = $this->date;
        $json = array_merge($json, parent::jsonSerialize());

        return $json;
    }
}