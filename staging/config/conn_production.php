<?php
// session start
session_start();

// setting default timezone 
date_default_timezone_set('asia/hong_kong');

// database connection
$con = mysqli_connect('localhost','warnawarni_cinta','uzmt3GU7NS1yXa7S','warnawarni_cinta');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

// function base_url
function base_url($url = null){
    $base_url = "https://warnawarni.baliola.com/dash";
    if($url != null){
        return $base_url."/".$url;
    }
    else{
        return $base_url;
    }
}

// function upload file to local database
function upload($path){
    $nameFile = $_FILES['image']['name'];
    $sizeFIle = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];
    $formatImg = ['jpg','jpeg','png','svg'];
    $format = explode('.', $nameFile);
    $format = strtolower(end($format));
    if($error === 4){
        echo "<script>alert ('image not found!')</script>";
        return false;
    }
    if(!in_array($format,$formatImg)){
        echo "<script>alert ('what you uploaded is not an image!')</script>";
        return false;
    }
    if($sizeFIle > 10000000){
        echo "<script>alert ('The image size is too large!')</script>";
        return false;
    }

    $newfilename = uniqid();
    $newfilename .= '.';
    $newfilename .= $format;

    move_uploaded_file($tmpName, $path . $newfilename);
    return $newfilename;
}
?>