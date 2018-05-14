<?php
$target_dir = "images/profile_pictures";
$target_file = $target_dir.time(). basename($_FILES["fileToUpload"]["name"]);


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        redirect( '/index.php/Pages/settings');
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    redirect( '/index.php/Pages/settings');
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    redirect( '/index.php/Pages/settings');
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    redirect( '/index.php/Pages/settings');
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    redirect( '/index.php/Pages/settings');
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //Changing profile picture name

        //load model
        $this->load->model('Message_model');

        $this->Auth_model->change_userpicture_name($_SESSION['user_id'],$target_file);


        redirect( '/index.php/Pages/settings');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
