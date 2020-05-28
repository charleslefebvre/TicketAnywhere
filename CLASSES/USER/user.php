<?php

include_once __DIR__ . "/userTDG.php";

class User
{
    private $id;
    private $email;
    private $userName;
    private $pw;
    private $admin;

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
        $this->password = $res['pw'];
        $this->admin = $res['admin'];

        $TDG = null;
        return true;
    }


    //Login Validation
    public function login($email, $pw)
    {
        if (!$this->load_user($email)) {
            return false;
        }

        if (!password_verify($pw, $this->password)) {
            $_SESSION['error'] = "No account found with given email and password!";
            return false;
        }
        $_SESSION["userID"] = $this->id;
        $_SESSION["userEmail"] = $this->email;
        $_SESSION["userName"] = $this->userName;
        $_SESSION["admin"] = $this->admin;

        return true;
    }
    public function existing_account($email)
    {
        $TDG = UserTDG::getInstance();
        $existing = $TDG->get_by_email($email);
        $TDG = null;
        return(!$existing)?false:true;
    }
    public function register($f_name, $l_name, $email, $address,$city,$zip,$pw)
    {
        if($this->existing_account($email)){
            $_SESSION['error'] = "Email is already registered";
            return false;
        }
        $TDG = UserTDG::getInstance();
        $resp = $TDG->register($f_name, $l_name, $email, $address,$city,$zip,password_hash($pw, PASSWORD_DEFAULT));
        if(!$resp){
            $_SESSION['error'] = "An error occured during the process of register";
            return false;
        }
        $TDG = null;
        return true;
    }
    
    public function findEmailById($id)
    {
        $TDG = UserTDG::getInstance();
        $res = $TDG->get_by_id($id);
        var_dump($res);

        if (!$res) {
            $TDG = null;
            $_SESSION['error'] = "No account found with given id";
            return false;
        }

        $TDG = null;
        return $res['email'];
    }
    public function getMostLoyalCustomer($amount){
        $TDG = UserTDG::getInstance();
        $userList = $TDG->get_most_loyal_customer($amount);
        $TDG = null;
        return $userList;
    }
}
