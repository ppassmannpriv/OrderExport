<?php 

class Shopware_Components_OrderExport
{

	public function getXml($arguments)
	{
		$orderData = $this->getOrder($arguments);
		$xml = Shopware()->OrderExportXml()->buildXml($orderData);
		
		return $xml;
	}

	private function getOrder($arguments)
	{
		$arguments;
		$orderData = 'asdf';
	
		return $orderData;
	}

}