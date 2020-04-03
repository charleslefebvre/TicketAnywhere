<?php
    include_once "../CLASSES/USER/user.php";

    session_start();

    if(isset($_SESSION["userID"]))
    {
       header("Location: ../index.php");
       die();
    }

    $email = $_POST["email"];
    $pw = $_POST["pw"];

    $user = new User();

    if($user->login($email, $pw))
        header("Location: ../index.php");
    else
        header("Location: ../login.php");
    die();

?>
