<?php
    $userArray = array();
    if(!    isset($_SESSION['userID'])){
        array_push($userArray,"<button class='btn' id='login'onclick='window.location.href=`login.php`'>Login</button>",
        "<button class='btn' id='register' onclick='window.location.href=`register.php`'>Register</button>");
    }
    else{
        array_push($userArray,"<p>Username</p>","<img src='IMG/user.png'>");
    }
?>
<div id="navbar">
    <div class="dropdown">
        <button class="btn" id="dropdownMenuButton" data-toggle="dropdown">
            <img src="IMG/hamburger.png" >
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="about.php">About</a>
            <a class="dropdown-item" href="#">Contact</a>
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="register.php">Register</a>
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