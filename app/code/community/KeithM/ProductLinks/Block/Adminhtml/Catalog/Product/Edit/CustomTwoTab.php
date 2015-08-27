<?php

/**
 * @category Magento
 * @package ProductLinks
 * @author Keith Mifsud <keith@kmc-software.co.uk>
 * @copyright Copyright (c) Keith Mifsud (http://keith-mifsud.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */


class KeithM_ProductLinks_Block_Adminhtml_Catalog_Product_Edit_CustomTwoTab
extends Mage_Adminhtml_Block_Widget
implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function canShowTab()
    {
        return true;
    }

    public function getTabLabel()
    {
        return $this->__('Custom Two');
    }

    public function getTabTitle()
    {
        return $this->__('Custom Two');
    }

    public function isHidden()
    {
        return false;
    }

    public function getTabUrl()
    {
        return $this->getUrl('*/*/customtwo', array('_current' => true));
    }

    public function getTabClass()
    {
        return 'ajax';
    }

}