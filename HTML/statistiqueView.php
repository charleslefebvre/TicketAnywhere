<?php 
    include __DIR__ . "/../CLASSES/CATEGORY/category.php";
    include __DIR__ . "/../CLASSES/USER/user.php";

    function load_statistic(){
        $category = new Category();
        $catList = $category->getMostPopularCategory();

        foreach($catList as $cat){
            echo "
            <div>
                <h5>".$cat['description']."</h5>
                <p>".$cat['ticketAmount']." ticket</p>
            </div>
            ";
        }
    }

    function load_loyal_customer($amount){
        $user = new User();
        $userList = $user->getMostLoyalCustomer($amount);

        foreach($userList as $u){
            echo "
            <div>
                <h5>".$u['f_name']." ".$u['l_name']."</h5>
                <p>".$u['ticketAmount']." ticket</p>
            </div>
            ";
        }
    }

?>
<p id="title">Statistiques</p>
<div>
    <h3>Ticket sold per category</h3>
    <?php load_statistic(); ?>
    <h3>Most loyal client</h3>
    <?php load_loyal_customer(3) ?>
</div>