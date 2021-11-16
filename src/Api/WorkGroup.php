<?php

namespace Craymend\HotDocsAdvancePhpSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;

class WorkGroup extends ApiBase
{
    /**
     * "Get a list of all work groups"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkGroups()
    {
        $url = "WorkGroups";

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
     * "Get details of a work group"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkGroup()
    {
        $workGroupId = $this->id;

        $url = "WorkGroups/$workGroupId";

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
     * "Get the user groups associated with a work group"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkGroupUserGroups()
    {
        $workGroupId = $this->id;

        $url = "WorkGroups/$workGroupId/UserGroups";

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
     * "Get a list of work items in a work group"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkGroupWorkItems()
    {
        $workGroupId = $this->id;

        $url = "WorkGroups/$workGroupId/WorkItems";

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
     * "Get a list of templates in a work group"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkGroupTemplatePackages()
    {
        $workGroupId = $this->id;

        $url = "WorkGroups/$workGroupId/TemplatePackages";

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
     * "Give user groups access to a work group"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function addUserGroupToWorkGroup($userGroupId)
    {
        $workGroupId = $this->id;

        $url = "WorkGroups/$workGroupId/UserGroups";

        $curOptions = $this->options;
        $curOptions['headers'] = [
            'Authorization' => $this->accessToken
        ];

        // add json to request
        $curOptions[RequestOptions::JSON] = [
            $userGroupId
        ];

        $client = new Client([
            'base_uri' => $this->baseUrl
        ]);

        try{
            $response = $client->request('PUT', $url, $curOptions);

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