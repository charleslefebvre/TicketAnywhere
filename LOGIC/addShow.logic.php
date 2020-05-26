<?php
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";
    include_once __DIR__ . "/../CLASSES/REPRESENTATION/representation.php";
    include_once __DIR__ . "/../UTILS/imageHandler.php";
    
    session_start();

    if($_FILES['showImage']['name'] === ''){
        header("Location: ../addShow.php");
        $_SESSION['alertMessage'] = "You have to select a photo";
        die();
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $categoryId = $_POST['categoryId'];
    $price = $_POST['price'];
    $artist = $_POST['artist'];
    $url = ImageHandler::FileToImageURL($_FILES['showImage']);

    $repData = array();

    foreach($_POST as $key => $value){
        if(strpos($key, 'auditoriumId') !== false){
            $repData[intval(substr($key, -1, 1))]['auditorium'] = $value;
        } else if(strpos($key, 'date') !== false){
            $repData[intval(substr($key, -1, 1))]['date'] = $value;
        }
    }

    $show = new Show();
    $id = $show->addShow($name, $description, $categoryId, $price, $artist, $url);
    if(is_null($id)){
        header("Location: ../addShow.php");
        $_SESSION['alertMessage'] = "An error occured, please try again";
        die();
    }

    $representation = new Representation();
    foreach($repData as $rep){
        if($rep['date'] !== ''){
            $representation->addRepresentation($id['id'], $rep['date'], $rep['auditorium']);
        }
    }

    header("Location: ../allShows.php");
    die();
?>