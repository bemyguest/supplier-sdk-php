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
class RetrieveConfigResponse extends BaseResponse implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var array $data public property
     */
    public $data;

    /**
     * Constructor to set initial or default values of member properties
     * @param   array             $data   Initialization value for the property $this->data
     */
    public function __construct()
    {
        if(1 == func_num_args())
        {
            $this->data = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['data'] = $this->data;
        $json = array_merge($json, parent::jsonSerialize());

        return $json;
    }
}