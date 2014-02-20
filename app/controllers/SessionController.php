<?php
//namespace Example\Controllers;

//use Example\Models\Users;

class SessionController extends ControllerBase
{
		public function initialize(){
			$this->view->setTemplateBefore('public');
		}

    public function indexAction()
    {

    }

    public function loginAction(){
      if($this->request->isPost()){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = Users::findFirstByLogin($username);
        
        if ($user) {
          if ($this->security->checkHash($password, $user->password)) {
            $this->_registerSession($user);

            $this->flash->success('User logged successfully! Welcome to the app!');
            return $this->dispatcher->forward(array(
                'controller' => 'index',
                'action' => 'index'
            ));
          }
        }

        $this->flash->error('Username and/or pass are invalid, try again.');
        return false;
      }
    }

    public function signupAction(){
    	if($this->request->isPost()){
    		$user = new Users();

        $username              = $this->request->getPost('username');
        $password              = $this->request->getPost('password');
        $password_confirmation = $this->request->getPost('password_confirmation');

        if ($password != $password_confirmation) {
            $this->flash->error('Passwords are diferent');
            return false;
        }

        $user->assign(array(
          'username' => $username,
          'password' => $this->security->hash($password)
        ));

        if(!$user->validation()){
          $this->flash->error('Username already exists, take anoda!');
          return false;
        }

        if ($user->save()) {
          $this->_registerSession($user);

          $this->flash->success('User created successfully! Welcome to the app!');
          return $this->dispatcher->forward(array(
              'controller' => 'index',
              'action' => 'index'
          ));
        }
    	}

    }

    /**
     * Register authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession($user)
    {
      $this->session->set('auth', array(
          'id' => $user->id,
          'username' => $user->username
      ));
    }

    /**
     * Finishes the active session redirecting to the login
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');
        //return $this->response->redirect("session/login");
        return $this->dispatcher->forward(array("controller" => "session","action" => "login"));
    }
}

