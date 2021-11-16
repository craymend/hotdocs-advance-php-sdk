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
$api->requestAccessToken();

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
$api->requestAccessToken();

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

## License

The MIT License (MIT).



[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
