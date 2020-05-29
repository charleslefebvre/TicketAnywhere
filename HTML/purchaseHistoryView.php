<?php 
    include __DIR__ . "/../CLASSES/PURCHASE/purchase.php";

    if(!isset($_SESSION['userID'])){
        header("Location: ../index.php");
        die();
    }

    $longueurKey = 12;
    $key = "";
    for($i=1;$i<longueurKey;$i++)
    {
        $key .= mt_rand(0,9);
    }
?>
<p id="title">Purchase History</p>
<div id="container">
    <div id="list">
        <h3>Numéro de confirmation: <?php echo $key ?></h3>
        <?php
            $purchase = new Purchase();
            $purchase->loadPurchase($_SESSION['userID']);
        ?>
    </div>
</div>
