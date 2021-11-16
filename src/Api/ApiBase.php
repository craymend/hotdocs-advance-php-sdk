<?php

namespace Craymend\HotDocsAdvancePhpSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;

class ApiBase
{
    function __construct($tenancy, $baseUrl, $clientName, $principalName, $principalPassword, $options) {
        $this->tenancy = $tenancy;
        $this->baseUrl = "https://$tenancy.$baseUrl/";

        $this->clientName = $clientName;
        $this->principalName = $principalName;
        $this->principalPassword = $principalPassword;

        $this->accessToken = '';

        // used to set query options
        $this->options = $options;
    }

    /**
     * https://stackoverflow.com/a/18206984
     * 
     * @return string
     */
    function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }
        else {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"

            // $uuid = chr(123)// "{"
            //     .substr($charid, 0, 8).$hyphen
            //     .substr($charid, 8, 4).$hyphen
            //     .substr($charid,12, 4).$hyphen
            //     .substr($charid,16, 4).$hyphen
            //     .substr($charid,20,12)
            //     .chr(125);// "}"

            $uuid = substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);

            return $uuid;
        }
    }

    /**
     * create a uuid
     * 
     * @return string
     */
    function createUuid(){
        $uuid = getGUID();
        $lowerCaseUuid = strtolower($uuid);
        $trimmedUuid = substr(substr($lowerCaseUuid, 1), 0, -1);
        
        return $trimmedUuid;
    }

    /**
     * "You must sign your requests with an access token when making requests to the HotDocs Advance API."
     * "This request retrieves an access token from Advance, using a service principal account. 
     *    Once you successfully retrieve the access token, you can then use it to sign requests to the Advance API."
     * 
     * https://help.hotdocs.com/advance/cloud/current/admin/Get_a_security_token_for_the_service_principal_account.htm
     * 
     * @return stdObject
     */
    private function requestAccessToken(){
        $tenancy = $this->tenancy;

        $authBaseUrl  = "https://$tenancy.hotdocsadvance.com/Auth/Authorize/ServicePrincipalLogIn";
        $url = '';

        $curOptions = $this->options;

        $client = new Client([
            'base_uri' => $authBaseUrl
        ]);

        // add json to request
        $curOptions[RequestOptions::JSON] = [
            "clientName" => $this->clientName,
            "PrincipalName" => $this->principalName,
            "PrincipalPassword" => $this->principalPassword
        ];

        try{
            $response = $client->request('POST', $url, $curOptions);

            $body = (string) $response->getBody();
            $data = $body;

            return (object) [
                'code' => $response->getStatusCode(),
                'message' => $response->getReasonPhrase(),
                'data' => $data,
                'status' => 'success'
            ];
        }catch(GuzzleException $e){
            return (object) [
                'error' => $e->getMessage(),
                'status' => 'fail'
            ];
        }
    }

    /**
     * @return stdObject
     */
    public function authenticate(){
        $ret = $this->requestAccessToken();

        if($ret->status == 'success'){
            $this->setAccessToken($ret->data);
        }

        return $ret;
    }

    /**
     * @return null
     */
    public function setAccessToken($accessToken){
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessToken(){
        return $this->accessToken;
    }
}