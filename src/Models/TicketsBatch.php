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
class TicketsBatch implements JsonSerializable {
    /**
     * @todo Write general description for this property
     * @required
     * @var bool $adultsAllowed public property
     */
    public $adultsAllowed;

    /**
     * @todo Write general description for this property
     * @required
     * @var uuid|string $barcodeTypeUuid public property
     */
    public $barcodeTypeUuid;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $childrenAllowed public property
     */
    public $childrenAllowed;

    /**
     * @todo Write general description for this property
     * @required
     * @var uuid|string $currencyUuid public property
     */
    public $currencyUuid;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $pricePerTicket public property
     */
    public $pricePerTicket;

    /**
     * @todo Write general description for this property
     * @required
     * @var uuid|string $productTypesUuid public property
     */
    public $productTypesUuid;

    /**
     * @todo Write general description for this property
     * @required
     * @var Ticket[] $tickets public property
     */
    public $tickets;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $ticketsBatchName public property
     */
    public $ticketsBatchName;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $ticketsBatchReference public property
     */
    public $ticketsBatchReference;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $ticketsOrderDate public property
     */
    public $ticketsOrderDate;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $ticketsPerPerson public property
     */
    public $ticketsPerPerson;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $validFrom public property
     */
    public $validFrom;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $validTo public property
     */
    public $validTo;

    /**
     * @todo Write general description for this property
     * @var string $ticketsOrderReference public property
     */
    public $ticketsOrderReference;

    /**
     * Constructor to set initial or default values of member properties
     * @param   bool              $adultsAllowed           Initialization value for the property $this->adultsAllowed        
     * @param   uuid|string       $barcodeTypeUuid         Initialization value for the property $this->barcodeTypeUuid      
     * @param   bool              $childrenAllowed         Initialization value for the property $this->childrenAllowed      
     * @param   uuid|string       $currencyUuid            Initialization value for the property $this->currencyUuid         
     * @param   integer           $pricePerTicket          Initialization value for the property $this->pricePerTicket       
     * @param   uuid|string       $productTypesUuid        Initialization value for the property $this->productTypesUuid     
     * @param   array             $tickets                 Initialization value for the property $this->tickets              
     * @param   string            $ticketsBatchName        Initialization value for the property $this->ticketsBatchName     
     * @param   string            $ticketsBatchReference   Initialization value for the property $this->ticketsBatchReference
     * @param   string            $ticketsOrderDate        Initialization value for the property $this->ticketsOrderDate     
     * @param   integer           $ticketsPerPerson        Initialization value for the property $this->ticketsPerPerson     
     * @param   string            $validFrom               Initialization value for the property $this->validFrom            
     * @param   string            $validTo                 Initialization value for the property $this->validTo              
     * @param   string            $ticketsOrderReference   Initialization value for the property $this->ticketsOrderReference
     */
    public function __construct()
    {
        if(14 == func_num_args())
        {
            $this->adultsAllowed         = func_get_arg(0);
            $this->barcodeTypeUuid       = func_get_arg(1);
            $this->childrenAllowed       = func_get_arg(2);
            $this->currencyUuid          = func_get_arg(3);
            $this->pricePerTicket        = func_get_arg(4);
            $this->productTypesUuid      = func_get_arg(5);
            $this->tickets               = func_get_arg(6);
            $this->ticketsBatchName      = func_get_arg(7);
            $this->ticketsBatchReference = func_get_arg(8);
            $this->ticketsOrderDate      = func_get_arg(9);
            $this->ticketsPerPerson      = func_get_arg(10);
            $this->validFrom             = func_get_arg(11);
            $this->validTo               = func_get_arg(12);
            $this->ticketsOrderReference = func_get_arg(13);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['adultsAllowed']         = $this->adultsAllowed;
        $json['barcodeTypeUuid']       = $this->barcodeTypeUuid;
        $json['childrenAllowed']       = $this->childrenAllowed;
        $json['currencyUuid']          = $this->currencyUuid;
        $json['pricePerTicket']        = $this->pricePerTicket;
        $json['productTypesUuid']      = $this->productTypesUuid;
        $json['tickets']               = $this->tickets;
        $json['ticketsBatchName']      = $this->ticketsBatchName;
        $json['ticketsBatchReference'] = $this->ticketsBatchReference;
        $json['ticketsOrderDate']      = $this->ticketsOrderDate;
        $json['ticketsPerPerson']      = $this->ticketsPerPerson;
        $json['validFrom']             = $this->validFrom;
        $json['validTo']               = $this->validTo;
        $json['ticketsOrderReference'] = $this->ticketsOrderReference;

        return $json;
    }
}