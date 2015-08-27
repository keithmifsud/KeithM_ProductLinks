<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class KeithM_ProductLinks_Model_Observer extends Varien_Object
{
    /**
     * Prepare save
     *
     * @param $observer
     */
    public function catalogProductPrepareSave($observer)
    {
        $event = $observer->getEvent();

        $product = $event->getProduct();
        $request = $event->getRequest();

        $links = $request->getPost('links');
        if (isset($links['customone']) && !$product->getCustomoneReadonly()) {
            $product->setCustomOneLinkData(Mage::helper('adminhtml/js')->decodeGridSerializedInput($links['customone']));
        }

        if (isset($links['custotwo']) && !$product->getCustomtwoReadonly()) {
                    $product->setIsAlternativeLinkData(Mage::helper('adminhtml/js')->decodeGridSerializedInput($links['custotwo']));
        }
    }


    /**
     * Checks for Duplicates
     *
     * @param $observer
     */
    public function catalogModelProductDuplicate($observer)
    {
        $event = $observer->getEvent();

        $currentProduct = $event->getCurrentProduct();
        $newProduct = $event->getNewProduct();

        $this->customOneDuplicates($currentProduct, $newProduct);
        $this->customTwoDuplicates($currentProduct, $newProduct);
    }


    /**
     * Check for Duplicates
     *
     * @param $currentProduct
     * @param $newProduct
     */
    public function customOneDuplicates($currentProduct, $newProduct)
    {
        $data = array();
        $currentProduct->getLinkInstance()->useCustomOneLinks();

        $attributes = array();
        foreach ($currentProduct->getLinkInstance()->getAttributes() as $_attribute) {
            if (isset($_attribute['code'])) {
                $attributes[] = $_attribute['code'];
            }
        }

        foreach ($currentProduct->getCustomONeLinkCollection() as $_link) {
            $data[$_link->getLinkedProductId()] = $_link->toArray($attributes);
        }

        $newProduct->setCustomOneLinkData($data);
    }


    /**
     * Check for Duplicates
     *
     * @param $currentProduct
     * @param $newProduct
     */
    public function customTwoDuplicates($currentProduct, $newProduct)
    {
        $data = array();
        $currentProduct->getLinkInstance()->useCustomTwoLinks();

        $attributes = array();
        foreach ($currentProduct->getLinkInstance()->getAttributes() as $_attribute) {
            if (isset($_attribute['code'])) {
                $attributes[] = $_attribute['code'];
            }
        }

        foreach ($currentProduct->getCustomTwoLinkCollection() as $_link) {
            $data[$_link->getLinkedProductId()] = $_link->toArray($attributes);
        }

        $newProduct->setCustomTwoLinkData($data);
    }
}