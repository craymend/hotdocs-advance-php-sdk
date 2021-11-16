<?php

namespace Craymend\HotDocsAdvancePhpSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class User extends ApiBase
{
    /**
     * "Get a list of all users"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getUsers()
    {
        $url = "Users";

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
     * "Get a user's details"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getUser()
    {
        $userId = $this->id;

        $url = "Users/$userId";

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