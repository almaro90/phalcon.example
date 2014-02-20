<?php
//namespace Example\Controllers;

class UsersController extends ControllerBase
{
		public function initialize(){
			$this->view->setTemplateBefore('private');
		}

    public function indexAction($numberPage = 1)
    {
    	$users = Users::find(array(
		    "conditions" => "id != ?1",
		    "bind"       => array(1 => $this->session->get('auth')['id'])));

    	$paginator = new Phalcon\Paginator\Adapter\Model(array(
			    "data" => $users,    //Data to paginate
			    "limit" => 3,           //Rows per page
			    "page" => $numberPage   //Active page
			));

			//Get active page in the paginator
			$page = $paginator->getPaginate();

			$this->view->setVar("page", $page);
    }

    public function editAction($id){
    	$request = $this->request;
			if (!$request->isPost()) {

				$user = Users::findFirstById($id);
				if (!$user) {
					$this->flash->error("User was not found");
					return $this->dispatcher->forward(array("controller" => "users","action" => "index"));
				}

				$this->view->setVar('user', $user);
			}
    }

    public function deleteAction($id = null){
    	$request = $this->request;
			if (!$request->isPost()) {

				$user = Users::findFirstById($id);
				if (!$user) {
					$this->flash->error("User was not found");
					return $this->dispatcher->forward(array("controller" => "users","action" => "index"));
				}

				$this->view->setVar('user', $user);
			}	else {
				$user = Users::findFirstById($this->request->getPost('id'));
				if (!$user) {
					$this->flash->error("User was not found");
					return $this->dispatcher->forward(array("controller" => "users","action" => "index"));
				} else if($user->delete() == false){
					$this->flash->error("Cant delete this user right now :(");
					return false;
				} else {
					$this->flash->success("User deleted successfully!");
					return $this->dispatcher->forward(array("controller" => "users","action" => "index"));	
				}
			}
    }

}
