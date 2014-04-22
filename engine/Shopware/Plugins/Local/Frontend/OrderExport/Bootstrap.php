<?php
class Shopware_Plugins_Frontend_OrderExport_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    public function getCapabilities()
    {
        return array(
            'install' => true,
            'enable' => true,
            'update' => false
        );
    }
 
    public function getLabel()
    {
        return 'Order Export (XML)';
    }
 
    public function getVersion()
    {
        return "1.0.0";
    } 
 
    public function getInfo() {
        return array(
            'version' => $this->getVersion(),
            'copyright' => 'Copyright (c) 2014, Pieter Paßmann',
            'label' => $this->getLabel(),
			'autor' => 'Pieter Paßmann',
            'description' => file_get_contents($this->Path() . 'info.txt'),
            'support' => 'http://www.turn-up.eu',
            'link' => 'http://www.turn-up.eu',
            'changes' => array(
                '0.0.1'=>array('releasedate'=>'2014-03-20', 'lines' => array(
                    'First Test'
                ))
            ),
            'revision' => '3'
        );
    }
 
    public function update($version)
    {
        return true;
    }
 
    public function install()
    {
        $this->subscribeEvents();
 
        // -Modul
        /*$this->createMenuItem(array(
            'label' => 'Order Export',
            'controller' => 'viewExport',
            'class' => 'sprite-box-zipper',
            'action' => 'Index',
            'active' => 1,
            'parent' => $this->Menu()->findOneBy('label', 'MENÜ')
        ));
 
		*/
		$this->createConfiguration();
        return array(
            'success' => true,
            'message' => 'All is well.'
        );

    }

	public function createConfiguration()
	{
		$form = $this->Form();
		$repository = Shopware()->Models()->getRepository('Shopware\Models\Config\Form');
		
		$form->setElement('text', 'xmlPath',
			array(
				'label' => 'XML Pfad',
				'value' => 'wo soll die XML abgelegt werden?',
				'scope' => Shopware\Models\Config\Element::SCOPE_SHOP,
				'description' => 'XML Pfad für Orderexport',
				'required' => true,
			)
		);

		$form->setParent(
			$repository->findOneBy(
				array('name' => 'Interface')
			)
		);
	}
 
    public function uninstall()
    {
		/*
        $this->Application()->Models()->removeAttribute(
            's_articles_attributes',
            'ppassmann',
            'ExportXml'
        );
 
        $this->getEntityManager()->generateAttributeModels(array(
            's_articles_attributes'
        ));
		*/
        return true;
    }
 
    private function subscribeEvents()
    {
 
        $this->subscribeEvent(
            'Shopware_Modules_Order_SendMail_FilterVariables',
            'onSaveOrder'
        );
 
 
        $this->subscribeEvent(
			'Enlight_Bootstrap_InitResource_OrderExport',
            'onInitResourceOrderExport'
		);

		$this->subscribeEvent(
			'Enlight_Bootstrap_InitResource_OrderExportHelper',
            'onInitResourceOrderExportHelper'
		);
 
    }

	public function onInitCollection(Enlight_Event_EventArgs $arguments)
	{
		$this->onInitResourceOrderExport($arguments);
		#$this->onInitResourceOrderExportHelper($arguments);
	}

	public function onInitResourceOrderExport(Enlight_Event_EventArgs $arguments)
    {
        $this->Application()->Loader()->registerNamespace(
            'Shopware_Components',
            $this->Path() . 'Components/'
        );
 
        $component = new Shopware_Components_OrderExport();
 
        return $component;
    }

	public function onInitResourceOrderExportHelper(Enlight_Event_EventArgs $arguments)
    {
		$this->Application()->Loader()->registerNamespace(
            'Shopware_Components_Helper',
            $this->Path() . 'Components/Helper/'
        );
 
        $component = new Shopware_Components_Helper_DataOperations();
 
        return $component;

	}
	

	public function onSaveOrder(Enlight_Event_EventArgs $arguments)
	{
			
			$orderExport = Shopware()->OrderExport();
			
			$helper = Shopware()->OrderExportHelper();

			/* Yay, this works! */
			
			
			//CREATE AN ORDER XML? POST TO WEBSERVICE? FUNTIMES!
			if($helper->createFile('test', $helper->setXmlPath(), 'xml', 'This is just a test, move along!'))
			{
				echo 'superb!';
			} else {
				echo 'wait what?';
			}
			
	}
	
	
    public function afterInit()
    {
        $this->registerCustomModels();
    }
 
 
}
 