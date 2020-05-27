<?php
    include_once "../CLASSES/USER/user.php";

    session_start();

    if(isset($_SESSION["userID"]))
    {
       header("Location: ../index.php");
       die();
    }
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST["email"];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = str_replace(' ', '',$_POST['zip']);
    $pw = $_POST["pw"];

    $user = new User();

    if($user->register($f_name, $l_name, $email, $address,$city,$zip,$pw))
        if(isset($_POST['email']))
        {
            mail($email, 'Email de confirmation', 'Bonjour, ce message vous a été envoyé automatiquement pour confirmer votre inscription.');
            echo 'Un email de confirmation a été envoyé';
        }
        header("Location: ../login.php");
    else
        header("Location: ../register.php");
    die();

?>
