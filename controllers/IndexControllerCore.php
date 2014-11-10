<?php

namespace UsersModule\Controller;

use \Model\User as User;

class IndexControllerCore extends \Host\Controller\BaseController
{
    public function indexAction()
    {
    	//	init
    	$this->init();
    	
    	//	set vars
    	$this->view->userArray = User::find();

		//	set main view
		$this->view->setMainView('block-module-users/index');
    }
}