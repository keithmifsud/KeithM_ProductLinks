<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

// Instructions for Test

# 1 Choose which Soap Version you want to test. Enter "1" or "2" accordingly.
$selectedApiVersion = 2; // or 1

# 2 Choose which method you wish to test. Enter "1" for assign, "2" for remove, "3" for list, "4" for types
$selectedMethod = 1; // or 2, 3, 4

# 3 Depending on the chosen method you will need to provide the testing parameters.
# Refer to http://www.magentocommerce.com/api/soap/catalog/catalogProductLink/catalogProductLink.html
# for more help. Only change the parameters (below) you need for the chosen methods.

// Just so we can see what strings are available !!
$linkTypes = array(
    1   =>  'related', // Core
    2   =>  'up_sell', // Core
    3   =>  'cross_sell', // Core
    4   =>  'grouped', // Core
    5   =>  'custom_one', // Custom
    6   =>  'custom_two', // Custom
);

$linkType = $linkTypes[6]; // Choose from $linkTypes above if required by chosen method.

$productIdToLinkFrom = 371; //  Change the product Id (or SKU) if required by the chosen method.

$productIdToLinkTo = 867; // Change the product Id (or SKU) if required by the chosen method.

# 4 Enter the url and credentials of your testing environment

$baseUrl = 'http://127.0.0.1:8080'; // change accordingly.
$apiUser = 'apiUser'; // change accordingly.
$apiKey = 'apikey'; // change accordingly.

# 5 Point the browser to: http://your_base_url/keithm_apitest.php
# The expected output is a var_dump of your chosen method.
# Refer to http://www.magentocommerce.com/api/soap/catalog/catalogProductLink/catalogProductLink.html
# for more help.

# 6 Change the above settings to test other version/methods/parameters and refresh the page.


# # # The Test above should help you to easily test versions and methods on your community/staging machine
# # # To test that assignments and removal of links are done correctly you can either use the list method of the apis
# # # or view from the product edit page in admin.

# # # The code below is the code used for the tests and can be used as an implementation example.

$apiSettings = ['base_url' => $baseUrl, 'api_user' => $apiUser, 'api_key' => $apiKey];

$v1Parameters = function() use ($selectedMethod, $linkType, $productIdToLinkFrom, $productIdToLinkTo) {
    switch ($selectedMethod) {
        case 1:
            $payload = [
                'type' => $linkType,
                'product' => $productIdToLinkFrom,
                'linkedProduct' => $productIdToLinkTo
            ];
            break;
        case 2:
            $payload = [
                'type' => $linkType,
                'product' => $productIdToLinkFrom,
                'linkedProduct' => $productIdToLinkTo
            ];
            break;
        case 3:
            $payload = [
                'type' => $linkType,
                'product' => $productIdToLinkFrom
            ];
            break;
        case 4:
            $payload = [];
            break;
        default:
            $payload = [];
    }
    return $payload;
};

$v1Methods = array(
    1   =>  'catalog_product_link.assign', # Expected Output "boolean true"
    2   =>  'catalog_product_link.remove', # Expected Output "boolean true"
    3   =>  'catalog_product_link.list', # Expected Output Array of catalogProductLinkEntity
    4   =>  'catalog_product_link.types' # Expected Output Array of Link Types
);

$v1TestAction = function($client, $session) use ($selectedMethod, $v1Methods, $v1Parameters){
    if ($selectedMethod == 4) {
        $callToAction =  $client->call($session, $v1Methods[$selectedMethod]);
    } else {
        $callToAction = $client->call($session, $v1Methods[$selectedMethod], $v1Parameters());
    }
    return $callToAction;
};

$v1ApiTest = function() use ($apiSettings, $v1TestAction){
    $client = new SoapClient($apiSettings['base_url'] . '/api/soap/?wsdl');
    $session = $client->login($apiSettings['api_user'], $apiSettings['api_key']);
    return $v1TestAction($client, $session);
};

$v2Parameters = array(
    'type'          =>  $linkType,
    'product'       =>  $productIdToLinkFrom,
    'linkedProduct' =>  $productIdToLinkTo
);

$v2Methods = array(
    1   =>  'catalogProductLinkAssign', # Expected Output "boolean true"
    2   =>  'catalogProductLinkRemove', # Expected Output "boolean true"
    3   =>  'catalogProductLinkList', # Expected Output Array of catalogProductLinkEntity
    4   =>  'catalogProductLinkTypes' # Expected Output Array of Link Types
);

$v2TestAction = function($proxy, $sessionId) use ($selectedMethod, $v2Methods, $v2Parameters){
    switch ($selectedMethod) {
        case 1:
            $callToAction = $proxy->$v2Methods[$selectedMethod](
                $sessionId, $v2Parameters['type'], $v2Parameters['product'], $v2Parameters['linkedProduct']
            );
            break;
        case 2:
            $callToAction = $proxy->$v2Methods[$selectedMethod](
                $sessionId, $v2Parameters['type'], $v2Parameters['product'], $v2Parameters['linkedProduct']
            );
            break;
        case 3:
            $callToAction = $proxy->$v2Methods[$selectedMethod](
                $sessionId, $v2Parameters['type'], $v2Parameters['product']
            );
            break;
        case 4:
            $callToAction = $proxy->$v2Methods[$selectedMethod]($sessionId);
            break;
        default:
            $callToAction = null;
    }
    return $callToAction;
};

$v2ApiTest = function() use ($apiSettings, $v2TestAction){
    $proxy = new SoapClient($apiSettings['base_url'] . '/api/v2_soap/?wsdl');
    $sessionId = $proxy->login($apiSettings['api_user'], $apiSettings['api_key']);
    return $v2TestAction($proxy, $sessionId);
};

$runTest = function() use ($selectedApiVersion, $v1ApiTest, $v2ApiTest) {
    switch ($selectedApiVersion) {
        case 1:
            $result = $v1ApiTest();
            break;
        case 2:
            $result = $v2ApiTest();
            break;
        default:
            $result = $v1ApiTest();
    }
    var_dump($result);
};


$runTest();
