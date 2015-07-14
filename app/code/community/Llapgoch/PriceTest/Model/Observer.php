<?php
class Llapgoch_PriceTest_Model_Observer{
	public function getPrices(){
		
		$product = Mage::getModel('catalog/product')->loadByAttribute('sku', 'LLAPGOCH-SIMPLE');
		
		// The base price including discounts (customer group / special price etc)
		// To change the product price programatically, see modify prices
		 //var_dump($product->getFinalPrice());
		// This one is wrong in all sorts of ways, mixing currencies and wrong values. Stay away.
		 //var_dump($product->getFormatedPrice());
		// The base price of the product, as set inside the admin
		 //var_dump($product->getPrice());
		
		 // This formats the curency and converts it to that of the current store
		  //var_dump(Mage::helper('core')->currency(Mage::helper('tax')->getPrice($product, $product->getFinalPrice())));
		 // Remember to set this correctly as for United States incorrectly adds tax on a price with tax already
		var_dump($countryCode = Mage::getStoreConfig('general/country/default'));
	}
	
	// Demo of modifying prices
	public function modifyPrices($observer){
		$product = $observer->getProduct();
		$product->setFinalPrice(10000);
	}
}