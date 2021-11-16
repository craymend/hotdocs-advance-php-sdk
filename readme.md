# HotDocs Advance PHP REST API SDK

[![Software License][ico-license]](LICENSE)


Query HotDocs API

## Installation

Via composer.  
```
composer require craymend/hotdocs-advance-php-sdk
```

## API Usage Example - GET
```php
use Craymend\HotDocsAdvancePhpSdk\Api\WorkItem;

// creds
$tenancy = 'xxxxxx';
$baseUrl = 'hotdocsadvance.com/api/rest/v1.1';
$clientName = 'xxxxxx';
$principalName = 'xxxxxx';
$principalPassword ='xxxxxx'; 

// $curlOptions = [];

$api = new WorkItem(
    $tenancy,
    $baseUrl,
    $clientName,
    $principalName,
    $principalPassword,
    $curlOptions
);

// set access token for API calls
$api->authenticate();

$workItemId = 'xxxxxx';

// set item id for API call
$api->id = $workItemId;

// send request to API
$data = $api->getWorkItem();

echo json_encode($data);

```

## API Usage Example - PUT
```php
use Craymend\HotDocsAdvancePhpSdk\Api\WorkItem;

// creds
$tenancy = 'xxxxxx';
$baseUrl = 'hotdocsadvance.com/api/rest/v1.1';
$clientName = 'xxxxxx';
$principalName = 'xxxxxx';
$principalPassword ='xxxxxx'; 

// $curlOptions = [];

$api = new WorkItem(
    $tenancy,
    $baseUrl,
    $clientName,
    $principalName,
    $principalPassword,
    $curlOptions
);

// set access token for API calls
$api->authenticate();

$workGroupId = 'xxxxxxx';
$templatePackageId = 'xxxxxxx';

// uuid for new work item
$newUuid = $api->createUuid();

// send request to API
$data = $api->createWorkItem($newUuid, [
    "workGroupId" => $workGroupId,
    "name" => "Test Work Item",
    "description" => "For testing SDK",
    "templatePackageId" => $templatePackageId,
    "answerXml" => "",
    "assembleImmediately" => true,
    "completeAssemblySession" => true,
    "isPrivateToOwner" => true
]);

echo json_encode($data);

```

## API Usage Example - Download File
```php
use Craymend\HotDocsAdvancePhpSdk\Api\Document;

// creds
$tenancy = 'xxxxxx';
$baseUrl = 'hotdocsadvance.com/api/rest/v1.1';
$clientName = 'xxxxxx';
$principalName = 'xxxxxx';
$principalPassword ='xxxxxx'; 

// $curlOptions = [];

$api = new Document(
    $tenancy,
    $baseUrl,
    $clientName,
    $principalName,
    $principalPassword,
    $curlOptions
);

// set access token for API calls
$api->authenticate();

$fileName = date('YmdHis') . '_' . uniqid() . '.docx';
$filePath = __DIR__ . '/hotdocs-tmp';

$workItemId = 'xxxxxx';
$documentId = 'xxxxxx';

$api->id = $documentId;

// stores file contents in the provided file location
$ret = $api->getWorkItemDocumentContent($workItemId, $filePath, $fileName);

// return file to client
header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
readfile($filePath . '/' . $fileName);

```

## License

The MIT License (MIT).



[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
