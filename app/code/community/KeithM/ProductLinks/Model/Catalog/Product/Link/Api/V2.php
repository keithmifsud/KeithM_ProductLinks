<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class KeithM_ProductLinks_Model_Catalog_Product_Link_Api_V2 extends Mage_Catalog_Model_Product_Link_Api_V2
{
    /**
     * Product link type mapping, used for references and validation
     *
     * @var array
     */
    protected $_typeMap = array(
        'related'       =>  Mage_Catalog_Model_Product_Link::LINK_TYPE_RELATED,
        'up_sell'       =>  Mage_Catalog_Model_Product_Link::LINK_TYPE_UPSELL,
        'cross_sell'    =>  Mage_Catalog_Model_Product_Link::LINK_TYPE_CROSSSELL,
        'grouped'       =>  Mage_Catalog_Model_Product_Link::LINK_TYPE_GROUPED,
        'custom_one'    =>  KeithM_ProductLinks_Model_Catalog_Product_Link::LINK_TYPE_CUSTOMONE,
        'custom_two'    =>  KeithM_ProductLinks_Model_Catalog_Product_Link::LINK_TYPE_CUSTOMTWO,
    );
}