<?php
    $userArray = array();
    $dropDownItems = array('About');
    if(!isset($_SESSION['userID'])){
        $userButtons = array('Login','Register');
        foreach($userButtons as $button){
            array_push($userArray,"<button class='btn' id='".strtolower($button)."'onclick='window.location.href=`".strtolower($button).".php`'>$button</button>");
        }
        array_push($dropDownItems,'Login','Register');
    }
    else{
        array_push($userArray,"<p>".$_SESSION['userName']."</p>",

        "<div class='dropdown'>
            <button class='btn' id='dropdownMenuButton' data-toggle='dropdown'>
                <img src='IMG/user.png'>
            </button>
            <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
                <a class='dropdown-item' href='cart.php'>My cart</a>
                <a class='dropdown-item' href='settings.php'>Settings</a>
            </div>
        </div>");
        array_push($dropDownItems,'Logout');
    }
?>
<div id="navbar">
    <div class="dropdown">
        <button class="btn" id="dropdownMenuButton" data-toggle="dropdown">
            <img src="IMG/hamburger.png" >
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php
            foreach($dropDownItems as $item){
                echo "<a class='dropdown-item' href='".strtolower($item).".php'>$item</a>";
            }
        ?>
        </div>
    </div>
    <a href="./" id="title"><h6>Ticket</h6><h6>Anywhere</h6></a>
    <div id="search-bar">
        <form method="post" action="searchResults.php">
            <input name="search" class="form-control" autocomplete="off" placeholder="Search for artists, auditoriums, and shows">
        </form>
    </div>
    <div id="user-container">
      <?php
        foreach($userArray as $element){
            echo $element;
        }
      ?>
    </div>
</div>