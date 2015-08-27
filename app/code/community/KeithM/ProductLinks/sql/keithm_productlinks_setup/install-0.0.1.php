<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

$installer = $this;

/**
 * Install the product link types
 */
$data = array(
    array(
        'link_type_id'  =>  KeithM_ProductLinks_Model_Catalog_Product_Link::LINK_TYPE_CUSTOMONE,
        'code'          =>  'customone'
    ),
    array(
        'link_type_id'  =>  KeithM_ProductLinks_Model_Catalog_Product_Link::LINK_TYPE_CUSTOMTWO,
        'code'          =>  'customtwo'
    ),
);

foreach ($data as $bind) {
    $installer->getConnection()->insertForce($installer->getTable('catalog/product_link_type'), $bind);
}

/**
 * Install product links' attributes
 */

$data = array(
    array(
        'link_type_id'                  =>  KeithM_ProductLinks_Model_Catalog_Product_Link::LINK_TYPE_CUSTOMONE,
        'product_link_attribute_code'   =>  'position',
        'data_type'                     => 'int'
    ),
    array(
        'link_type_id'  =>  KeithM_ProductLinks_Model_Catalog_Product_Link::LINK_TYPE_CUSTOMTWO,
        'product_link_attribute_code'   =>  'position',
        'data_type'                     => 'int'
    ),
);

$installer->getConnection()->insertMultiple($installer->getTable('catalog/product_link_attribute'), $data);