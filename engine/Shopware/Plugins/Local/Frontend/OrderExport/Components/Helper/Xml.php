<?php 

class Shopware_Components_Helper_Xml
{
	public function buildXml($orderData)
	{
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>'.PHP_EOL;
			$xml .= '<billingAddress>'.PHP_EOL;
				$xml .= $this->getBillingAddress($orderData);
			$xml .= '</billingAddress>'.PHP_EOL;

			$xml .= '<shippingAddress>'.PHP_EOL;
				$xml .= $this->getShippingAddress($orderData);
			$xml .= '</shippingAddress>'.PHP_EOL;
			
			$xml .= '<basket>'.PHP_EOL;
				$xml .= $this->getAllItems($orderData);
				$xml .= $this->getTotals($orderData);
			$xml .= '</basket>'.PHP_EOL;

		return $xml;
	}

	public function getBillingAddress($orderData)
	{
		$xml = '';
		return $xml;
	}

	public function getShippingAddress($orderData)
	{
		$xml = '';
		return $xml;
	}

	public function getAllItems($orderData)
	{
		$xml = '';
		foreach($items as $item)
		{
			$xml .= '<item>'.PHP_EOL;

				$xml .= '<name>'.PHP_EOL;
					$xml .= '';
				$xml .= '</name>'.PHP_EOL;

				$xml .= '<sku>'.PHP_EOL;
					$xml .= '';
				$xml .= '</sku>'.PHP_EOL;

				$xml .= '<cost>'.PHP_EOL;
					$xml .= '';
				$xml .= '</cost>'.PHP_EOL;

				$xml .= '<options>'.PHP_EOL;
					$xml .= '';
				$xml .= '</options>'.PHP_EOL;

			$xml .= '</item>'.PHP_EOL;
		}
		return $xml;
	}

	public function getTotals($orderData)
	{
		$xml = '';
		$xml .= '<totals>'.PHP_EOL;
			$xml .= '';
		$xml .= '</totals>'.PHP_EOL;
		return $xml;
	}
}