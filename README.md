#  Product Links Magento Module

Magento module which extends the Product Link Api to provide several new product link types. The module includes the ability to use the new product link types via the Soap APIs versions 1 and 2. Furthermore, the module provides new tabs in the product management forms (new and edit) with grid views of the linked products.

** This is a very early development version **


The module has been tested extensively, however, it is recommended to test on a local or staging environment before installing it on a production server. **Please review the file structure before installing to ensure that it doesn't override existing files.**

## Installation

To install, download the source code or clone the repository and extract in your magento installation.
The module is automatically enabled in magento.
 
## Testing
 
 The source code includes a php test file keithm_apitest.php. Copy this file to the magento root directory of your local installation or any other web root with php support.
 
 The files contains instructions for testing different:
  API versions,
  four of the methods available through the Magento core api,
  All the core and new product link types and 
  different products.
  
## Usage

The module can be used through the product management pages in magento and via the SOAP APIs.

Please refer to the [Magento API documentation](http://www.magentocommerce.com/api/soap/catalog/catalogProductLink/catalogProductLink.html) for instructions on using the Product Link APIs. The module supports both versions of the SOAP Apis and all available methods. The only addition is the new product link types.