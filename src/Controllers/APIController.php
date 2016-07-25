<?php
/*
 * BeMyGuestSuppliersAPIV1Lib
 *
 * This file was automatically generated for BeMyGuest by APIMATIC v2.0 ( https://apimatic.io ) on 07/25/2016
 */

namespace BeMyGuestSuppliersAPIV1Lib\Controllers;

use BeMyGuestSuppliersAPIV1Lib\APIException;
use BeMyGuestSuppliersAPIV1Lib\APIHelper;
use BeMyGuestSuppliersAPIV1Lib\Configuration;
use BeMyGuestSuppliersAPIV1Lib\Models;
use BeMyGuestSuppliersAPIV1Lib\Http\HttpRequest;
use BeMyGuestSuppliersAPIV1Lib\Http\HttpResponse;
use BeMyGuestSuppliersAPIV1Lib\Http\HttpMethod;
use BeMyGuestSuppliersAPIV1Lib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class APIController extends BaseController {

    /**
     * @var APIController The reference to *Singleton* instance of this class
     */
    private static $instance;
    
    /**
     * Returns the *Singleton* instance of this class.
     * @return APIController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * A Config object has the following attributes:
     * + `timezone` - Our sever timezone
     * + `now` - Our server timestamp
     * + `version` - Current version is "1.0"
     * + `serverUrl` - Main API URL
     * + user - All important userdata for provided API key
     *     + `name` - Name / Company / Organization
     *     + `email` - E-Mail Address
     *     + `uuid` - Unique ID
     *     + `defaultPagination` - Default Pagination value (per page), between 1-100
     *     + `defaultCurrencyUuid` - Default currency UUID for /products (if not specified)
     *     + `defaultCurrencyCode` - Default currency code for /products (if not specified)
     *     + `defaultLanguageUuid` - Default language UUID  /products (if not specified)
     *     + `defaultLanguageCode` - Default language code  /products (if not specified)
     * + `products` - A list of supplier products
     *     + `productTypes` - A list of prodcut types bellonging to this product
     * + `languages` - A list of supported languages.
     * + `currencies` - An array of supported currencies.
     * + `barcodeTypes` - An array of supported barcode types.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function retrieveConfig () 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/suppliers/config';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'BeMyGuest.Suppliers.SDK.v1',
            'Accept'        => 'application/json',
            'X-Authorization' => Configuration::$xAuthorization
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Wrong Arguments', 400, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 403) {
            throw new APIException('Forbidden', 403, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Resource Not Found', 404, $response->body);
        }

        else if ($response->code == 405) {
            throw new APIException('Method Not Allowed', 405, $response->body);
        }

        else if ($response->code == 410) {
            throw new APIException('Resource No Longer Available', 410, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\RetrieveConfigResponse());
    }
        
    /**
     * ## Add Tickets BatchPlease remember that with all update tickets status requests you need to providea proper Content-Type header.`Content-Type: application/json`Example JSON request:        {          "ticketsBatchName" : "1 DAY ADULT TAB 6M (PEAK)",          "ticketsBatchReference" : "USS1DADTAB6MA0210004",          "ticketsOrderReference" : "1609871",          "ticketsOrderDate" : "2016-01-12",          "ticketsPerPerson" : 1,          "productTypesUuid": [            "3016c3cf-d483-5e81-ad55-ba362670e2e2"          ],          "currencyUuid": "0a1f8d35-3b6f-54ac-8421-131f340b6334",          "barcodeTypeUuid": "a87e1e6f-c4f0-5655-b0b6-05e066bdb51b",          "adultsAllowed" : true,          "childrenAllowed" : true,          "seniorsAllowed" : true,          "validFrom" : "2016-01-15",          "validTo" : "2016-06-15",          "pricePerTicket" : 67.00,          "tickets": [            {              "value" : "100040100100005022",              "status" : "unused"            },            {              "value" : "100040100100005023",              "status" : "unused"            },            {              "value" : "100040100100005024",              "status" : "unused"            }          ]        }A response object has the following attributes:+ `ticketsBatchName` - name of the inserted ticket batch+ `ticketsBatchReference` - reference of the inserted ticket batch+ `ticketsOrderReference` - tickets order reference+ `ticketsOrderDate` - date - tickets order date+ `ticketsPerPerson` - integer+ `productTypesUuid` - array - all attached product types to this batch+ `currencyUuid` - string+ `barcodeTypeUuid` - string+ `adultsAllowed` - bool - batch validity for adults bookings - true|false+ `childrenAllowed` - bool - batch validity for children bookings - true|false+ `validFrom` - string - valid from date for the batch+ `validTo` - string - valid to date for the batch+ `pricePerTicket` - number - price per ticket+ `tickets` - array - list of all tickets that have been added to the batch with their number and statusesExample JSON response:        {          "data": {            "ticketsBatchName": "1 DAY ADULT TAB 6M (PEAK)",            "ticketsBatchReference": "USS1DADTAB6MA0210004",            "ticketsOrderReference": "1609871",            "ticketsOrderDate": "2016-01-12",            "ticketsPerPerson": 1,            "productTypesUuid": [              "3016c3cf-d483-5e81-ad55-ba362670e2e2"            ],            "currencyUuid": "0a1f8d35-3b6f-54ac-8421-131f340b6334",            "barcodeTypeUuid": "a87e1e6f-c4f0-5655-b0b6-05e066bdb51b",            "adultsAllowed": true,            "childrenAllowed": true,            "validFrom": "2016-01-15",            "validTo": "2016-06-15",            "pricePerTicket": 67,            "tickets": {              "data": [                {                  "value": "100040100100005022",                  "status": "unused",                  "usedAt": null                },                {                  "value": "100040100100005023",                  "status": "unused",                  "usedAt": null                },                {                  "value": "100040100100005024",                  "status": "unused",                  "usedAt": null                }              ]            }          }        }## Update Tickets StatusPlease remember that with all update tickets status requests you need to providea proper Content-Type header.`Content-Type: application/json`Example JSON request:        {          "data": [            {              "value" : "100040100100005022",              "status" : "used"            },           {              "value" : "0041018110401587837",                "status" : "unused"            }          ]        }A response object has the following attributes:+ `value` - value of ticket number+ `status` - unused / used / invalid - status of the ticket after the update+ `usedAt` - null / dateExample JSON response:        {          "data": [            {              "value": "100040100100005022",              "status": "used",              "usedAt": "2016-07-25 11:47:23"            },            {              "value": "0041018110401587837",              "status": "unused",              "usedAt": null            }          ]        }
     * @param  Models\AddTicketsBatchRequest $data     Required parameter: Example: 
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function addTicketsBatch (
                $data) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/suppliers/tickets';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'BeMyGuest.Suppliers.SDK.v1',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8',
            'X-Authorization' => Configuration::$xAuthorization
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Json($data));

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Wrong Arguments', 400, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 403) {
            throw new APIException('Forbidden', 403, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Resource Not Found', 404, $response->body);
        }

        else if ($response->code == 405) {
            throw new APIException('Method Not Allowed', 405, $response->body);
        }

        else if ($response->code == 410) {
            throw new APIException('Resource No Longer Available', 410, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\AddTicketsBatchResponse());
    }
        
    /**
     * Update statuses for all the provided tickets
     * @param  Models\UpdateTicketsStatusRequest $data     Required parameter: Example: 
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateTicketsStatus (
                $data) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/suppliers/tickets';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'BeMyGuest.Suppliers.SDK.v1',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8',
            'X-Authorization' => Configuration::$xAuthorization
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, Request\Body::Json($data));

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Wrong Arguments', 400, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 403) {
            throw new APIException('Forbidden', 403, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Resource Not Found', 404, $response->body);
        }

        else if ($response->code == 405) {
            throw new APIException('Method Not Allowed', 405, $response->body);
        }

        else if ($response->code == 410) {
            throw new APIException('Resource No Longer Available', 410, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\UpdateTicketsStatusResponse());
    }
        
    /**
     * Get status for specific ticket number.##ResponseA response object has the following attributes:+ `value` - value of ticket number+ `status` - unused / used / invalid - current status of the ticket+ `usedAt` - null / date
     * @param  string     $ticketNumber      Required parameter: Example: 
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getTicketStatus (
                $ticketNumber) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/suppliers/tickets/{ticket_number}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'ticket_number' => $ticketNumber,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'BeMyGuest.Suppliers.SDK.v1',
            'Accept'        => 'application/json',
            'X-Authorization' => Configuration::$xAuthorization
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('Wrong Arguments', 400, $response->body);
        }

        else if ($response->code == 401) {
            throw new APIException('Unauthorized', 401, $response->body);
        }

        else if ($response->code == 403) {
            throw new APIException('Forbidden', 403, $response->body);
        }

        else if ($response->code == 404) {
            throw new APIException('Resource Not Found', 404, $response->body);
        }

        else if ($response->code == 405) {
            throw new APIException('Method Not Allowed', 405, $response->body);
        }

        else if ($response->code == 410) {
            throw new APIException('Resource No Longer Available', 410, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\GetTicketStatusResponse());
    }
        

}