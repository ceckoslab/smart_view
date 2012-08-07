<?php

class CeckosLab_SmartView_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $_cartProductIds;


    public function __construct() {
        $product_ids = array();
        $products = Mage::getSingleton('checkout/session')->getQuote()->getAllVisibleItems();
        foreach ($products as $_products){
            $product_ids [$_products->getProductId()] = $_products->getQty();
        }
        $this->_cartProductIds = $product_ids;
        Mage::log($product_ids);
    }
    
    public function isInCart($product) {
        return array_key_exists($product->getId(), $this->_cartProductIds); 
    }
    
    public function getQty($product) {
        return  $this->_cartProductIds [$product->getId()]; 
    }
}