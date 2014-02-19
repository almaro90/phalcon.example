<?php
//namespace Example\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Uniqueness;

/**
 * Models\Users
 * All the users registered in the application
 */
class Users extends Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $password;


    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate()
    {
        
    }

    /**
     * Send a confirmation e-mail to the user if the account is not active
     */
    public function afterSave()
    {

    }

    /**
     * Validate that emails are unique across users
     */
    public function validation()
    {
        $this->validate(new Uniqueness(array(
            "field" => "username",
            "message" => "The username is already registered"
        )));

        return $this->validationHasFailed() != true;
    }

    public static function findFirstByLogin($login){
        // Query users binding parameters with string placeholders
        $conditions = "username = :username:";

        //Parameters whose keys are the same as placeholders
        $parameters = array(
            "username" => $login
        );

        //Perform the query
        $user = Users::findFirst(array(
            $conditions,
            "bind" => $parameters
        ));

        return $user;
    }
}
