<?php

namespace Craymend\HotDocsAdvancePhpSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TemplatePackage extends ApiBase
{
    /**
     * "Get a list of all template packages"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getTemplatePackages()
    {
        $url = "TemplatePackages";

        $curOptions = $this->options;
        $curOptions['headers'] = [
            'Authorization' => $this->accessToken
        ];

        $client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        try{
            $response = $client->request('GET', $url, $curOptions);

            $body = (string)$response->getBody();
            $data = json_decode($body);

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
     * "Get details of a specific template package"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getTemplatePackage()
    {
        $packageId = $this->id;
        
        $url = "TemplatePackages/$packageId";

        $curOptions = $this->options;
        $curOptions['headers'] = [
            'Authorization' => $this->accessToken
        ];

        $client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        try{
            $response = $client->request('GET', $url, $curOptions);

            $body = (string)$response->getBody();
            $data = json_decode($body);

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
}