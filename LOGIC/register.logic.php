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

    if($user->register($f_name, $l_name, $email, $address,$city,$zip,$pw)){
        $header = "TicketAnywhere Confirmation\r\n";
        $header .= 'From:"http://167.114.152.54/~billetpartout06/"<support@ticketanywhere>' . "\n";
        $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
        $header .= 'Content-Transfer-Encoding: 8bit';
        $message = '<h1>Bonjour,</h1><p>Ce message vous a été envoyé automatiquement pour confirmer votre inscription.</p>';
        mail($email, 'Email de confirmation', $message, $header);

        header("Location: ../login.php");
    }
    else
        header("Location: ../register.php");
    die();

?>
