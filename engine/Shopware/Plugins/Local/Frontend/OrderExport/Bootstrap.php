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
        return 'Graphodata Export';
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
            'description' => file_get_contents($this->Path() . 'info.txt'),
            'support' => 'http://turn-up.eu',
            'link' => 'http://turn-up.eu',
            'changes' => array(
                '0.0.1'=>array('releasedate'=>'2014-03-20', 'lines' => array(
                    'First Test'
                ))
            ),
            'revision' => '2'
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
            'label' => 'Graphodata Export',
            'controller' => 'viewExport',
            'class' => 'sprite-box-zipper',
            'action' => 'Index',
            'active' => 1,
            'parent' => $this->Menu()->findOneBy('label', 'MENÜ')
        ));
 
        $this->Application()->Models()->addAttribute(
            's_articles_attributes',
            'ppassmann',
            'ExportXml',
            'varchar(255)',
            true,
            null
        );
 
        $this->getEntityManager()->generateAttributeModels(array(
            's_articles_attributes'
        ));
		*/
        return array(
            'success' => true,
            'message' => 'All is well.'
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
		/*
        $this->subscribeEvent(
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_viewExport',
            'onGetBackendController'
        );*/
 
        /*$this->subscribeEvent(
            'Enlight_Controller_Action_PreDispatch_Frontend_Checkout',
            'onCheckoutPreDispatch'
        );*/
 
        $this->subscribeEvent(
            'Shopware_Modules_Order_SendMail_FilterVariables',
            'onSaveOrder'
        );
 
 
        /*$this->subscribeEvent(
            'sBasket::sAddArticle::before',
            'onAddArticle'
        );*/
 
		/*
        $this->subscribeEvent(
            'Enlight_Bootstrap_InitResource_ExportXml',
            'onInitMyComponent'
        );*/
 
    }

	public function onSaveOrder(Enlight_Event_EventArgs $arguments)
	{
		
			//CREATE AN ORDER XML? POST TO WEBSERVICE? FUNTIMES!

	}
 
    /*public function onGetBackendController(Enlight_Event_EventArgs $arguments)
    {
        $this->Application()->Template()->addTemplateDir(
            $this->Path() . 'Views/'
        );
        return $this->Path(). 'Controllers/Backend/viewExport.php';
    }
 
 
    public function onInitMyComponent(Enlight_Event_EventArgs $arguments)
    {
        $this->Application()->Loader()->registerNamespace(
            'Shopware_Components',
            $this->Path() . 'Components/'
        );
 
        $myComp = new Shopware_Components_ExportXml();
 
        return $myComp;
    }
 
    public function onAddArticle(Enlight_Hook_HookArgs $arguments)
    {
        $id = $arguments->get('id');
        $result = $arguments->getReturn();
 
        $arguments->setReturn($result);
        }
    }
 
 
    public function onCheckoutPostDispatch(Enlight_Event_EventArgs $arguments)
    {
        $subject = $arguments->getSubject();
 
        $request = $subject->Request();
 
        $response = $subject->Response();
 
        $view = $subject->View();
 
        if (!$request->isDispatched() || $response->isException() || !$view->hasTemplate()) {
            return;
        }
 
        $view->addTemplateDir($this->Path() . 'Views/');
 
    }
 
    public function onCheckoutPreDispatch(Enlight_Event_EventArgs $arguments)
    {
        $subject = $arguments->getSubject();
 
        $request = $subject->Request();
 
        $view = $subject->View();
 
    }
	*/
 
    public function afterInit()
    {
        $this->registerCustomModels();
    }
 
 
}
