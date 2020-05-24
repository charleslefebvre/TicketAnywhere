<?php
    include_once __DIR__ . "/../CLASSES/REPRESENTATION/representation.php";
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";
    include_once __DIR__ . "/../CLASSES/AUDITORIUM/auditorium.php";

    $currentShow = getShowByID($_GET['showId']);
    $representations = getRepresentationsByShowID($currentShow['id']);

    function getShowByID($id){
        $show = new Show();
        return $show->getByID($id);
    }

    function getRepresentationsByShowID($id){
        $representation = new Representation();
        return $representation->GetByShowID($id);
    }

    function displayRepresentations($represetationList){
        $representation = new Representation();
        $auditorium = new Auditorium();
        $representation->display($represetationList, $auditorium, getShowByID($_GET['showId']));
    }
    if(isset($_SESSION['alertMessage'])){
        $message = $_SESSION['alertMessage'];
        echo "<script>alert('$message')</script>";
        unset($_SESSION['alertMessage']);
    }
?>

<p id="title"><?php echo $currentShow['name'] ?></p>
<p id="subTitle">By <?php echo $currentShow['artist_name'] ?></p>
<div id="container">  
    <div id="list">
        <?php displayRepresentations($representations) ?>
    </div>
    <div id="moreRepresentationsContainer">
        <button id='moreRepresentations' class='btn btn-dark'>More</button>
    </div>
</div>