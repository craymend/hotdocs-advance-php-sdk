<?php

namespace Craymend\HotDocsAdvancePhpSdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;

class Document extends ApiBase
{
    /**
     * "Returns a list of assembled documents for the specified work item."
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkItemDocuments($workItemId)
    {
        $url = "WorkItems/$workItemId/Documents";

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
     * "Returns document metadata for a specific assembled document in a work item. 
     *   This request only returns documents from the latest completed assembly session for the work item."
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkItemDocument($workItemId)
    {
        $documentId = $this->id;
        
        $url = "WorkItems/$workItemId/Documents/$documentId";

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
     * "Returns the specified document. 
     *   This request only returns documents from the latest completed assembly session for the work item."
     * 
     * https://hotdocsadvance.com/api/rest/documentation/index.html
     * 
     * @return stdObject
     */
    public function getWorkItemDocumentContent($workItemId, $filePath, $fileName)
    {
        $documentId = $this->id;
        
        $url = "WorkItems/$workItemId/Documents/$documentId/Content";

        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }

        $curOptions = $this->options;
        $curOptions['headers'] = [
            'Authorization' => $this->accessToken,
        ];

        $client = new Client([
            'base_uri' => $this->baseUrl,
            'sink' => $filePath . '/' . $fileName
        ]);

        try{
            $response = $client->request('GET', $url, $curOptions);

            // $body = (string)$response->getBody();
            // $data = json_decode($body);
            // $data = $body;

            return (object) [
                'code' => $response->getStatusCode(),
                'message' => $response->getReasonPhrase(),
                // 'data' => $data,
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