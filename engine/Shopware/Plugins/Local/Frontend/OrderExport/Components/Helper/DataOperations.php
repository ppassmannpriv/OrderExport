<?php 

class Shopware_Components_Helper_DataOperations
{

	public function test()
	{
		return 'helper test';
	}

	public function createFile($name, $path, $type, $data)
	{
		$filePath = $path.DS.$name.'.'.$type;
		file_put_contents($filePath, $data);
		if(file_exists($filePath))
		{
			return true;
		} else {
			return false;
		}
	}	

	public function setXmlPath()
	{
		$path = $_SERVER["DOCUMENT_ROOT"];
		$configString = Shopware()->Plugins()->Frontend()->OrderExport()->Config()->xmlPath;
		$path .= DS.$configString;
		return $path;
	}

}