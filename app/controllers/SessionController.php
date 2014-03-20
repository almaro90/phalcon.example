<?php
//namespace Example\Controllers;

//use Example\Models\Users;

use \Phalcon\Db\Column as Column;

class SessionController extends ControllerBase
{
		public function initialize(){
			//$this->view->setTemplateBefore('public');
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

      $this->view->form = new AutoLoginForm();
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

    public function autoAction(){
      if($this->request->isPost()){
        $id = $this->request->getPost('id');

        $user = Users::findFirst($id);
        
        if ($user) {
          $this->_registerSession($user);

          $this->flash->success('User <b>auto</b> logged successfully! Welcome to the app!');
          return $this->dispatcher->forward(array(
              'controller' => 'index',
              'action' => 'index'
          ));
        }

        $this->flash->error('Username and/or pass are invalid, try again.');
        return false;
      } else {
        $this->flash->error('You should use this action with form below.');
        return $this->dispatcher->forward(array("controller" => "session","action" => "login"));   
      }
    }

    public function resetAction(){
      $this->view->disable();
      if($this->request->isAjax() == true){
        // Required
        $config = array(
            "host" => "localhost",
            "username" => "usuario",
            "password" => "usuario",
            "dbname" => "datos"
        );

        // Optional
        $config["schema"] = "public";

        // Create a connection
        $connection = new \Phalcon\Db\Adapter\Pdo\Postgresql($config);

        $username = (!$this->request->getPost('username')) ? 'user': $this->request->getPost('username');

        $num = ($this->request->getPost('number'))?$this->request->getPost('number'):30;

        if($connection->tableExists("users")){
          $connection->dropTable("users");
        }

        $connection->execute("CREATE TABLE users (
          id          bigserial     constraint pk_usuario primary key,
          username    varchar(30)   not null constraint uq_users_user unique,
          password    varchar(60)   not null,
          created_at  date
        )");

        for ($i=0; $i < $num; $i++) { 
          $user = new Users();
          $user->assign(array(
            'username'   => $username . $i,
            'password'   => $this->security->hash($username . $i),
            'created_at' => date('d/m/Y h:i:s a', time())
          ));
          $user->save();
        }
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
        /*$this->flashSession->success('Database rollbacked and seeded ;)');
        return $this->response->redirect("session/login");*/
      }
      return false;
      /*$this->flash->error('This is only developers.');
      return $this->dispatcher->forward(array("controller" => "session","action" => "login"));   */
    }
}

