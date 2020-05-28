<?php 
    include __DIR__ . "/../CLASSES/PURCHASE/purchase.php";
    include __DIR__ . "/../CLASSES/AUDITORIUM/auditorium.php";
    include __DIR__ . "/../CLASSES/SHOW/show.php";
    include __DIR__ . "/../CLASSES/REPRESENTATION/representation.php";

    if(!isset($_SESSION['userID']) || !isset($_GET['purchaseId'])){
        header("Location: ../index.php");
        die();
    }

    $auditorium = new Auditorium();
    $show = new Show();
    $representation = new Representation();
?>
<p id="title">Receipt</p>
<div id="container">
    <?php 
        $purchase = new Purchase();
        $purchase->loadReceipt($_GET['purchaseId'], $auditorium, $show, $representation);
    ?>
</div>