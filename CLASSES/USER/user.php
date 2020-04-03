<?php

include_once __DIR__ . "/userTDG.php";

class User
{
    private $id;
    private $email;
    private $userName;
    private $pw;

    public function __construct(){}

    public function load_user($email)
    {
        $TDG = UserTDG::getInstance();
        $res = $TDG->get_by_email($email);

        if (!$res) {
            $TDG = null;
            $_SESSION['error'] = "No account found with given email and password!";
            return false;
        }

        $this->id = $res['id'];
        $this->email = $res['email'];
        $this->userName = $res['f_name'] . " " . $res['l_name'];
        $this->password = $res['password'];

        $TDG = null;
        return true;
    }


    //Login Validation
    public function login($email, $pw)
    {
        if (!$this->load_user($email)) {
            return false;
        }

        /*if (!password_verify($pw, $this->password)) {
            TODO!
        }*/
        $_SESSION["userID"] = $this->id;
        $_SESSION["userEmail"] = $this->email;
        $_SESSION["userName"] = $this->userName;

        return true;
    }
    public function validate_register($email)
    {
        $TDG = UserTDG::getInstance();
        $res = $TDG->get_by_email($email);
        $TDG = null;
        if ($res) {
            return false;
        }

        return true;
    }


    public function register($email, $f_name, $l_name, $pw)
    {
        if(!validate_register($email)){
            $_SESSION['error'] = "Email is already registered";
            return false;
        }
           

        $TDG = UserTDG::getInstance();
        $res = $TDG->add_user($email, $f_name, $l_name, password_hash($pw, PASSWORD_DEFAULT));
        $TDG = null;
        return true;
    }
}
