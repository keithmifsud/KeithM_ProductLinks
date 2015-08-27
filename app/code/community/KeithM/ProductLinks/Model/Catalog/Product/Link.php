<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class KeithM_ProductLinks_Model_Catalog_Product_Link extends Mage_Catalog_Model_Product_Link
{
    const LINK_TYPE_CUSTOMONE       = 6;
    const LINK_TYPE_CUSTOMTWO   = 7;

    /**
     * @return Mage_Catalog_Model_Product_Link
     */
    public function useCustomOneLinks()
    {
        $this->setLinkTypeId(self::LINK_TYPE_CUSTOMONE);

        return $this;
    }

    /**
     * @return Mage_Catalog_Model_Product_Link
     */
    public function useCustomTwoLinks()
    {
        $this->setLinkTypeId(self::LINK_TYPE_CUSTOMTWO);

        return $this;
    }


    /**
     * Save data for product relations
     *
     * @param Mage_Catalog_Model_Product $product
     * @return Mage_Catalog_Model_Product_Link
     */
    public function saveProductRelations($product)
    {
        parent::saveProductRelations($product);

        $data = $product->getCustomOneLinkData();
        if (!is_null($data)) {
            $this->_getResource()->saveProductLinks($product, $data, self::LINK_TYPE_CUSTOMONE);
        }

        $data = $product->getCustomTwoLinkData();
        if (!is_null($data)) {
            $this->_getResource()->saveProductLinks($product, $data, self::LINK_TYPE_CUSTOMTWO);
        }
    }
}