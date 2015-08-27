<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

require_once(Mage::getModuleDir('controllers','Mage_Adminhtml').DS.'Catalog'.DS.'ProductController.php');


class KeithM_ProductLinks_Adminhtml_Catalog_ProductController
extends  Mage_Adminhtml_Catalog_ProductController
{

    /**
     * Get custom one products grid and serializer block
     */
    public function customoneAction()
    {
        $this->_initProduct();
        $this->loadLayout();
        $this->getLayout()->getBlock('catalog.product.edit.tab.customone')
            ->setProductsHasAlternative($this->getRequest()->getPost('products_customone', null));
        $this->renderLayout();
    }

    /**
     * Get custom one products grid
     */
    public function customoneGridAction()
    {
        $this->_initProduct();
        $this->loadLayout();
        $this->getLayout()->getBlock('catalog.product.edit.tab.customone')
            ->setProductsRelated($this->getRequest()->getPost('products_customone', null));
        $this->renderLayout();
    }

    /**
     * Get custom two products grid and serializer block
     */
    public function customtwoAction()
    {
        $this->_initProduct();
        $this->loadLayout();
        $this->getLayout()->getBlock('catalog.product.edit.tab.customtwo')
            ->setProductsIsAlternative($this->getRequest()->getPost('products_customtwo', null));
        $this->renderLayout();
    }

    /**
     * Get custom two products grid
     */
    public function customtwoGridAction()
    {
        $this->_initProduct();
        $this->loadLayout();
        $this->getLayout()->getBlock('catalog.product.edit.tab.customtwo')
            ->setProductsRelated($this->getRequest()->getPost('products_customtwo', null));
        $this->renderLayout();
    }
}