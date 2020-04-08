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
<<<<<<< HEAD
        header("Location: ../index.php");
=======
        header("Location: ../");
>>>>>>> 3b9b4a7... Update
    else
        header("Location: ../login.php");
    die();

?>
