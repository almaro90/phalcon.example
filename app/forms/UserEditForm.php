<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;

class UserEditForm extends Form
{
    /**
     * This method returns the default value for field 'csrf'
     */
    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($user)
    {
        $username = new Text("username");
        $username->addValidator(new PresenceOf(array(
            'message' => 'The username is required'
        )));

        $username->addValidator(new StringLength(array(
            'min' => 6,
            'messageMinimum' => 'The username is too short'
        )));
        $this->add($username);

        $password = new Password("password");
        $password->addValidator(new PresenceOf(array(
            'message' => 'The password is required'
        )));
        $this->add($password);

        $this->add(new Hidden("id"));

        $password_confirmation = new Password("password_confirmation");
        $this->add($password_confirmation);

        //Add a text element to put a hidden csrf
        $this->add(new Hidden("csrf"));

        $this->add(new Submit("edit", array('class'=>'btn btn-success')));
    }
} 