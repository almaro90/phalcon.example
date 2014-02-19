<?php

//namespace Example\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerBase extends Controller
{
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $controllerName = $dispatcher->getControllerName();

        if(!$this->session->get('auth')){
        	if($controllerName != 'session'){
        		$this->flash->notice('You don\'t have access to that module:<b> private</b>. Redirected to login.');
        		//return $this->response->redirect("session/login");
            $dispatcher->forward(array(
                'controller' => 'session',
                'action' => 'login'
            ));
            return false;
        	}
        }
    }
}
