<?php

namespace WinesModule\Controller;

class AdminControllerCore extends \Host\Controller\BaseController
{
    public function init()
    {
        //  base init
        parent::init();

        //  build menu
        $menuItemArray  = array();
        $moduleArray    = \Model\Module::find();
        foreach($moduleArray AS $module)
        {
            $menuItemArray[]    = array('label'     => $module->name,
                                        'link'      => ROOT.$module->adminUrl,
                                        'active'    => false);
        }
        $this->view->menuItemArray  = $menuItemArray;
    }

	//	index
    public function indexAction()
    {
    	//	init
    	$this->init();

        //  get wines
        $this->view->wineArray = \Model\Wine::find();
    	
		//	set main view
		$this->view->setMainView('block-module-wines/admin-index');
    }

    //	create
    public function createAction()
    {
    	//	init
    	$this->init();
    	
		//	set main view
		$this->view->setMainView('block-module-wines/admin-create');
    }

    // update
    public function updateAction()
    {
    	//	init
    	$this->init();
    	
		//	set main view
		$this->view->setMainView('block-module-wines/admin-update');
    }

    //	delete
    public function deleteAction()
    {
    	//	init
    	$this->init();
    	
		//	set main view
		$this->view->setMainView('block-module-wines/admin-delete');
    }
}