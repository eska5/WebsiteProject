<?php
if(isset($_POST["submit"])) {
    if (isset($_POST['watermark'])){
        $watermark = $_POST['watermark'];
        }
    if (isset($_POST['autor'])){    
        $autor = $_POST['autor'];
    }
    if (isset($_POST['tytul'])){    
        $tytul = $_POST['tytul'];
    }
    if (isset($_POST['radioButn'])){    
        $valueb = $_POST['radioButn'];
    }
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
    echo "File already exists. ";
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    $uploadOk = 0;
    echo "File is too big. ";
}
// Allow certain file formats
if($imageFileType != "jpg"&&$imageFileType != "jpeg"&&$imageFileType != "png") {
    $uploadOk = 0;
    echo "File is not JPG, JPEG, PNG. ";
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. ";
    }
    if(($imageFileType == "jpg")||($imageFileType == "jpeg"))
    {
        $img = imagecreatefromjpeg("$target_file");
        $width  = imagesx($img);
        $height = imagesy($img);
    
    
        $width_mini = 200;
        $height_mini = 125;
        $img_mini = imagecreatetruecolor($width_mini, $height_mini);
        imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini , $height_mini, $width  , $height);



        $stamp = imagecreatetruecolor(200, 70);
        imagestring($stamp, 5, 20, 20, $watermark, 0xFFFFFF);
        $right = 10;
        $bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);
        imagecopymerge($img, $stamp, imagesx($img) - $sx - $right, imagesy($img) - $sy - $bottom, 0, 0, imagesx($stamp), imagesy($stamp), 70);



        imagejpeg($img, "watermark/" . "watermark-" .  basename($_FILES["fileToUpload"]["name"]), 100);
        imagejpeg($img_mini, "thumbnail/" . "min-" .  basename($_FILES["fileToUpload"]["name"]), 80);
        imagedestroy($img);
        imagedestroy($img_mini);
    }
    if($imageFileType == "png")
    {
        $img = imagecreatefrompng("$target_file");
        $width  = imagesx($img);
        $height = imagesy($img);
    
        $width_mini = 200;
        $height_mini = 125;
        $img_mini = imagecreatetruecolor($width_mini, $height_mini);

        imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini , $height_mini, $width  , $height);


        
        $stamp = imagecreatetruecolor(200, 70);
        imagestring($stamp, 5, 20, 20, $watermark, 0xFFFFFF);
        $right = 10;
        $bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);
        imagecopymerge($img, $stamp, imagesx($img) - $sx - $right, imagesy($img) - $sy - $bottom, 0, 0, imagesx($stamp), imagesy($stamp), 70);

echo  "watermark-" .  basename($_FILES["fileToUpload"]["name"]);
        imagepng($img, "watermark/" . "watermark-" .  basename($_FILES["fileToUpload"]["name"]));
        imagepng($img_mini, "thumbnail/" . "min-" .  basename($_FILES["fileToUpload"]["name"]));
        imagedestroy($img);
        imagedestroy($img_mini);
    }
include 'mongo.php';
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['filename'=>basename($_FILES["fileToUpload"]["name"]), 'tytul'=>$tytul,'autor'=>$autor,'private'=>$valueb]);
$manager->executeBulkWrite('wai.images',$bulk);
}
}
?>