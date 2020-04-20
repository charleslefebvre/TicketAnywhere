<<<<<<< HEAD
<?php
class ImageHandler {
    public static function FileToImageURL($file) {
        //check if the image is a fake image
        if (!getimagesize($file['tmp_name'])) {
             //Throw error (TO DO!)
        }


        $target_dir = "IMG/";

        //obtenir l'extention du fichier uploader
        $media_file_type = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Valid file extensions
        $img_extensions_arr = array("jpg", "jpeg", "png");

        if (!in_array($media_file_type, $img_extensions_arr)) {
            //Throw error (TO DO!)
        }

        //creation d'un nom unique pour la "PATH" du fichier
        $path = tempnam("../IMG", '');
        unlink($path);
        $file_name = basename($path, ".tmp");
        //creation de l'url pour la DB
        $url = $target_dir . $file_name . "." . $media_file_type;
        //deplacement du fichier uploader vers le bon repertoire (Medias)
        move_uploaded_file($file['tmp_name'], "../" . $url);

        return $url;
    }  
}

=======
<?php
class ImageHandler {
    public static function FileToImageURL($file) {
        //check if the image is a fake image
        if (!getimagesize($file['tmp_name'])) {
             //Throw error (TO DO!)
        }


        $target_dir = "IMG/";

        //obtenir l'extention du fichier uploader
        $media_file_type = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Valid file extensions
        $img_extensions_arr = array("jpg", "jpeg", "png");

        if (!in_array($media_file_type, $img_extensions_arr)) {
            //Throw error (TO DO!)
        }

        //creation d'un nom unique pour la "PATH" du fichier
        $path = tempnam("../IMG", '');
        unlink($path);
        $file_name = basename($path, ".tmp");
        //creation de l'url pour la DB
        $url = $target_dir . $file_name . "." . $media_file_type;
        //deplacement du fichier uploader vers le bon repertoire (Medias)
        move_uploaded_file($file['tmp_name'], "../" . $url);

        return $url;
    }  
}

>>>>>>> 670ebc6... Update
?>