<?php
// session start
session_start();

// setting default timezone 
date_default_timezone_set('asia/hong_kong');

// database connection
$con = mysqli_connect('localhost','root','','db_book');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

// function base_url
function base_url($url = null){
    $base_url = "https://localhost/cinta_selly/dash";
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
        echo "<script>alert ('Gambar tidak ditemukan')</script>";
        return false;
    }
    if(!in_array($format,$formatImg)){
        echo "<script>alert ('Apa yang anda upload bukan format gambar')</script>";
        return false;
    }
    if($sizeFIle > 10000000){
        echo "<script>alert ('Ukuran gambar terlalu besar')</script>";
        return false;
    }

    $newfilename = uniqid();
    $newfilename .= '.';
    $newfilename .= $format;

    move_uploaded_file($tmpName, $path . $newfilename);
    return $newfilename;
}
?>