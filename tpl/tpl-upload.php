<?php

session_start();

$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
        if(isset($_POST['uploadedFile']) && !empty($_POST['uploadedFile'])) {
            echo $msg = "The desired file was imported -  فایل اپلود شد ";
        }else{
            echo $msg = "Enter the file you want - فایل مورد نظر را انتخاب کنید ";
        }
    }
}

$_SESSION['msg'] = $msg;
// header("Location:");