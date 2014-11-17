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
    	
        //  if form submitted
        if($this->request->getPost('action') == 'save')
        {
            //  save new wine
            $wine           = new \Model\Wine();
            $wine->name     = $this->request->getPost('name',   'string');
            $wine->winery   = $this->request->getPost('winery', 'string');
            $wine->year     = $this->request->getPost('year',   'int');
            $wine->save();

            //  redirect
            $this->response->redirect(ROOT.'admin/wines/', true);
        }
        
		//	set main view
		$this->view->setMainView('block-module-wines/admin-create');
    }

    // update
    public function updateAction()
    {
    	//	init
    	$this->init();

        //  get wine
        $wine               = \Model\Wine::findFirstById($this->dispatcher->getParam('id'));
        
        //  if form submitted
        if($this->request->getPost('action') == 'save')
        {
            //  save wine
            $wine->name     = $this->request->getPost('name',   'string');
            $wine->winery   = $this->request->getPost('winery', 'string');
            $wine->year     = $this->request->getPost('year',   'int');
            $wine->save();

            //  redirect
            $this->response->redirect(ROOT.'admin/wines/', true);
        }
    	
        //  set wine
        $this->view->wine   = $wine;
        
		//	set main view
		$this->view->setMainView('block-module-wines/admin-update');
    }

    //	delete
    public function deleteAction()
    {
    	//	init
    	$this->init();
    	
        //  get wine
        $wine               = \Model\Wine::findFirstById($this->dispatcher->getParam('id'));
        
        //  if form submitted
        if($this->request->getPost('action') == 'delete')
        {
            //  delete wine
            $wine->delete();

            //  redirect
            $this->response->redirect(ROOT.'admin/wines/', true);
        }
        
        //  set wine
        $this->view->wine   = $wine;
        
		//	set main view
		$this->view->setMainView('block-module-wines/admin-delete');
    }
}