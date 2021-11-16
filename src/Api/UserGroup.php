<?php

namespace Craymend\HotDocsAdvancePhpSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UserGroup extends ApiBase
{
    /**
     * "Get list of user groups filtered by type"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getUserGroups()
    {
        $url = "UserGroups";

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
     * "Get a user group's details"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getUserGroup()
    {
        $userGroupId = $this->id;
        
        $url = "UserGroups/$userGroupId";

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