<?php
//namespace Example\Controllers;

class UsersController extends ControllerBase
{
		public function initialize(){
			$this->view->setTemplateBefore('private');
		}

    public function indexAction()
    {
    	$this->view->setVar("users", Users::find());
    }

}
