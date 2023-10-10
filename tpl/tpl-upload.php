<?php

session_start();

$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
        if(isset($_FILES['uploadedFile']) && !empty($_FILES['uploadedFile'])) {
            // var_dump($_FILES['uploadedFile']);
            $FileTmpName = $_FILES['uploadedFile']['tmp_name'];
            $FileName = $_FILES['uploadedFile']['name'];
            $FileSize = $_FILES['uploadedFile']['size'];
            $FileType = $_FILES['uploadedFile']['type'];
            $FileNameSeprate = explode('.',$FileName);
            // var_dump($FileNameEx);
            $FileExtention = strtolower(end($FileNameSeprate));
            $newFileName = md5(time().$FileName) . '.' . $FileExtention;
            $allowedFileExtention = ['jpg', 'jpeg', 'gif', 'zip', 'rar', 'png'];
            if(in_array($FileExtention, $allowedFileExtention)) {
                $uploadFileDir = "../bootstrap/upload/";
                $destPath = $uploadFileDir . $newFileName;
                if(move_uploaded_file($FileTmpName, $destPath)) {
                    echo $msg = "The desired file was imported -  فایل اپلود شد ";
                }else{
                    echo $msg = "Error uploading the file - خظا در اپلود فایل ";
                }
            }else{
                echo $msg = "The file you want to upload is not allowed - فایل مورد نظر شما برای اپلود مجاز نمی باشد ";
            }
        }else{
            echo $msg = "Enter the file you want - فایل مورد نظر را انتخاب کنید ";
        }
    }
}

$_SESSION['msg'] = $msg;
// header("Location:");