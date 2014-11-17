<?php

namespace WinesModule\Controller;

class PublicControllerCore extends \Host\Controller\BaseController
{
    public function indexAction()
    {
    	//	init
    	$this->init();

    	//	get wines
    	$this->view->wineArray = \Model\Wine::find();
    	
		//	set main view
		$this->view->setMainView('block-module-wines/public-index');
    }
}