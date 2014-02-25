<?php

use Phalcon\Forms\Form,
	Phalcon\Forms\Element\Select,
	Phalcon\Forms\Element\Submit;

class AutoLoginForm extends Form
{
	/**
	 * This method returns the default value for field 'csrf'
	 */
	public function getCsrf()
	{
		return $this->security->getToken();
	}

	public function initialize()
	{
		$username = new Select("id", Users::find(), array('using' => array('id','username')));

		$this->add($username);

		$this->add(new Submit("Auto", array('class'=>'btn btn-success')));
	}

}