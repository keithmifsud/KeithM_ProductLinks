<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class KeithM_ProductLinks_Model_Catalog_Product extends Mage_Catalog_Model_Product
{
    /**
     * Retrieve array of custom products
     *
     * @return array
     */
    public function getCustomOneProducts()
    {
        if (!$this->hasCustomOneProducts()) {
            $products = array();
            $collection = $this->getCustomOneProductCollection();
            foreach ($collection as $product) {
                $products[] = $product;
            }
            $this->setCustomOneProducts($products);
        }
        return $this->getData('custom_one_products');
    }

    /**
     * Retrieve custom products identifiers
     *
     * @return array
     */
    public function getCustomOneProductIds()
    {
        if (!$this->hasCustomOneProducts()) {
            $ids = array();
            foreach ($this->getCustomOneProducts() as $product) {
                $ids[] = $product->getId();
            }
            $this->setCustomOneProductIds($ids);
        }
        return $this->getData('custom_one_product_ids');
    }

    /**
     * Retrieve collection custom product
     *
     * @return Mage_Catalog_Model_Resource_Product_Link_Product_Collection
     */
    public function getCustomOneProductCollection()
    {
        $collection = $this->getLinkInstance()->useCustomOneLinks()
            ->getProductCollection()
            ->setIsStrongMode();
        $collection->setProduct($this);
        return $collection;
    }

    /**
     * Retrieve collection custom link
     *
     * @return Mage_Catalog_Model_Resource_Product_Link_Collection
     */
    public function getCustomOneLinkCollection()
    {
        $collection = $this->getLinkInstance()->useCustomOneLinks()
            ->getLinkCollection();
        $collection->setProduct($this);
        $collection->addLinkTypeIdFilter();
        $collection->addProductIdFilter();
        $collection->joinAttributes();
        return $collection;
    }

    /**
     * Retrieve array of is alternative products
     *
     * @return array
     */
    public function getCustomTwoProducts()
    {
        if (!$this->hasCustomTwoProducts()) {
            $products = array();
            $collection = $this->getCustomTwoProductCollection();
            foreach ($collection as $product) {
                $products[] = $product;
            }
            $this->setCustomTwoProducts($products);
        }
        return $this->getData('custom_two_products');
    }

    /**
     * Retrieve custom products identifiers
     *
     * @return array
     */
    public function getCustomTwoProductIds()
    {
        if (!$this->hasCustomTwoProducts()) {
            $ids = array();
            foreach ($this->getCustomTwoProducts() as $product) {
                $ids[] = $product->getId();
            }
            $this->setCustomTwoProductIds($ids);
        }
        return $this->getData('custom_two_product_ids');
    }

    /**
     * Retrieve collection custom product
     *
     * @return Mage_Catalog_Model_Resource_Product_Link_Product_Collection
     */
    public function getCustomTwoProductCollection()
    {
        $collection = $this->getLinkInstance()->useCustomTwoLinks()
            ->getProductCollection()
            ->setIsStrongMode();
        $collection->setProduct($this);
        return $collection;
    }

    /**
     * Retrieve collection custom link
     *
     * @return Mage_Catalog_Model_Resource_Product_Link_Collection
     */
    public function getCustomTwoLinkCollection()
    {
        $collection = $this->getLinkInstance()->useCustomTwoLinks()
            ->getLinkCollection();
        $collection->setProduct($this);
        $collection->addLinkTypeIdFilter();
        $collection->addProductIdFilter();
        $collection->joinAttributes();
        return $collection;
    }
}