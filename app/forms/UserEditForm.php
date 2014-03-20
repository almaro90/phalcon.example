<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength,
    Phalcon\Validation\Validator\Confirmation;

class UserEditForm extends Form
{
    /**
     * This method returns the default value for field 'csrf'
     */
    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($user, $edit = false)
    {
        $username = new Text("username", array('placeholder'=>'Username'));
        $username->addValidators(array(
            new PresenceOf(array(
            'message' => 'The username is required'
            )),
            new StringLength(array(
            'min' => 6,
            'messageMinimum' => 'The username is too short'
            ))
        ));

        $this->add($username);

        $password = new Password("password", array('placeholder'=>'Password'));

        /*$password->addValidators(array(
            new PresenceOf(array(
                'message' => 'The password is required'
            )), 
             new Confirmation(array(
                'message' => 'Password doesn\'t match confirmation',
                'with'    => 'password_confirmation'
            ))
        ));*/
       
        $this->add($password);

        $password_confirmation = new Password("password_confirmation", array('placeholder'=>'Password confirmation'));
        /*$password_confirmation->addValidators(array(
            new PresenceOf(array(
                'message' => 'The password confirmation is required'
            ))
        ));*/
        $this->add($password_confirmation);

        if($edit)
            $this->add(new Hidden("id"));

        //Add a text element to put a hidden csrf
        $this->add(new Hidden("csrf"));
        if($edit)
            $this->add(new Submit("edit", array('class'=>'btn btn-success', 'value'=> 'Edit')));
        else
            $this->add(new Submit("edit", array('class'=>'btn btn-success', 'value'=> 'Create')));
    }
}