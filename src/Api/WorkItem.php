<?php

namespace Craymend\HotDocsAdvancePhpSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;

class WorkItem extends ApiBase
{
    /**
     * "Get a list of all work items"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkItems()
    {
        $url = "WorkItems";

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
     * "Get work item details"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkItem()
    {
        $workItemId = $this->id;
        
        $url = "WorkItems/$workItemId";

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
     * "Create a new work item"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * $params = 
     * [
     *    "workGroupId": "string,
     *    "name": string,
     *    "description": string,
     *    "templatePackageId": string,
     *    "answerXml": string,
     *    "assembleImmediately": bool,
     *    "completeAssemblySession": bool,
     *    "isPrivateToOwner": bool
     * ]
     * 
     * @param uuid string
     * @param params []
     * @return stdObject
     */
    public function createWorkItem($uuid, $params)
    {
        $url = "WorkItems/$uuid";

        $curOptions = $this->options;
        $curOptions['headers'] = [
            'Authorization' => $this->accessToken
        ];

        // add json to request
        $curOptions[RequestOptions::JSON] = $params;

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

    /**
     * "Create a new assembly session for a work item"
     * 
     * "Create a new assembly session for a work item. 
     *   You use the assembly session to process a HotDocs template and output a result, typically a document. 
     *   You can only create a new assembly session for a work item if it does not have an existing active assembly session."
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * $params = 
     * [
     *    "answerXml" => string,
     *    "forceCreate" => bool
     * ]
     * 
     * @param uuid string
     * @param params []
     * @return stdObject
     */
    public function createWorkItemAssemblySession($uuid, $params)
    {
        $workItemId = $this->id;

        $url = "WorkItems/$workItemId/Versions/$uuid";

        $curOptions = $this->options;
        $curOptions['headers'] = [
            'Authorization' => $this->accessToken
        ];

        $curOptions[RequestOptions::JSON] = $params;

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

    /**
     * "Complete an in-progress assembly session"
     * 
     * "Complete a work item's in-progress assembly session. 
     *   You can download the documents from a completed assembly session using:
     *    - The GET /WorkItems/{id}/Documents endpoint, to retrieve a list of assembled documents
     *    - The GET /WorkItems/{id}/Documents/{documentId}/Content, to retrieve individual documents"
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * $params = 
     * [
     *    "runAssembly" => bool
     * ]
     * 
     * @param versionId string
     * @param params []
     * @return stdObject
     */
    public function setWorkItemAssemblySessionComplete($versionId, $params)
    {
        $workItemId = $this->id;

        $url = "WorkItems/$workItemId/Versions/$versionId/CompleteSession";

        $curOptions = $this->options;
        $curOptions['headers'] = [
            'Authorization' => $this->accessToken
        ];

        $curOptions[RequestOptions::JSON] = $params;

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