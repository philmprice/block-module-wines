<?php

namespace WinesModule\Controller;

use \Model\Wine as Wine;

class IndexControllerCore extends \Host\Controller\BaseController
{
    public function indexAction()
    {
    	//	init
    	$this->init();
    	
    	//	set vars
    	$this->view->wineArray = Wine::find();

		//	set main view
		$this->view->setMainView('block-module-wines/index');
    }
}