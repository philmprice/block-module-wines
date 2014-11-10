<?php

$blockVendor		= "philmprice";									//	github vendor name
$blockFolder        = "block-module-users";							//	github project name (must start with 'block-module-')
$blockHandle		= str_replace('block-module-','',$blockFolder);
$blockUpperHandle	= handle2upperHandle($blockHandle);								
$blockNamespace		= $blockUpperHandle.'Module';

////////////////////////////
//  ROUTES

$indexControllerData = array(
    'controller'    => 'index',
    'action'        => 'index',
    'namespace'     => $blockNamespace.'\Controller'
);
$router->add("/users", 	$indexControllerData);
$router->add("/users/", $indexControllerData);

////////////////////////////
//  CLASSES

$loaderClassArray[$blockNamespace.'\Controller\IndexControllerCore']	= ABS_ROOT.CORE_FOLDER.'/'.$blockAuthor.'/'.$blockFolder.'/controllers/IndexControllerCore.php';
$loaderClassArray[$blockNamespace.'\Controller\IndexController']		= ABS_ROOT.PROJ_FOLDER.'/'.$blockAuthor.'/'.$blockFolder.'/controllers/IndexController.php';

$loaderClassArray['Model\UserCore']										= ABS_ROOT.CORE_FOLDER.'/'.$blockAuthor.'/'.$blockFolder.'/models/UserCore.php';
$loaderClassArray['Model\User']											= ABS_ROOT.PROJ_FOLDER.'/'.$blockAuthor.'/'.$blockFolder.'/models/User.php';

////////////////////////////
//  AUTOLOAD FOLDERS

$loaderDirArray[]   = '../../'.$blockFolder.'/models/';
$loaderDirArray[]   = '../../'.$blockFolder.'/php/objects/';

////////////////////////////
//  NAMESPACES

// $loaderNamespaceArray['BlockModule\Pages']	= "../../".$blockFolder."/php/objects/";