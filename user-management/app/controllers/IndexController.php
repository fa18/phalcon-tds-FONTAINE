<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$users=User::find();
    	$this->view->setVar("users",$users);
    }

}

