<<<<<<< HEAD
<?php
    include_once __DIR__ . "/../UTILS/loader.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="STYLES/document.css">
        <link rel="stylesheet" href="STYLES/nav.css">
        <?php
            load_styles($styles);
        ?>        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto|Rubik&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        <?php echo (isset($script)?"<script src='JS/$script'></script>": "") ?>
        <title><?php echo $title ?></title>
    </head>
    <body>
    <?php 
            include_once "nav.php";
            echo "<div class='jumbotron'>";
            load_modules($content); 
            echo "</div>";
    ?>        
    </body>
=======
<?php
    include_once __DIR__ . "/../UTILS/loader.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="STYLES/document.css">
        <link rel="stylesheet" href="STYLES/nav.css">
        <?php
            load_styles($styles);
        ?>        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto|Rubik&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        <?php echo (isset($script)?"<script src='JS/$script'></script>": "") ?>
        <title><?php echo $title ?></title>
    </head>
    <body>
    <?php 
            include_once "nav.php";
            echo "<div class='jumbotron'>";
            load_modules($content); 
            echo "</div>";
    ?>        
    </body>
>>>>>>> 670ebc6... Update
</html>