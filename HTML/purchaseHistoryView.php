<?php 
    include __DIR__ . "/../CLASSES/PURCHASE/purchase.php";

    if(!isset($_SESSION['userID'])){
        header("Location: ../index.php");
        die();
    }
?>
<p id="title">Purchase History</p>
<div id="container">
    <div id="list">
        <?php 
            $purchase = new Purchase();
            $purchase->loadPurchase($_SESSION['userID']);
        ?>
    </div>
</div>