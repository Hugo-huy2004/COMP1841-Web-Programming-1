<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";
try{
    if(isset($_POST['subject'])){
        sendMail($pdo,$_SESSION['userID'],$_POST['receiver'],$_POST['subject'],$_POST['message']);
        header('location: adminMailForm.php');
    }
    $users = getAllUsers($pdo);
    ob_start();
    include '../templates/admin/adminMailForm.html.php';
    $content = ob_get_clean();
    include '../templates/admin/adminLayout.html.php';
} catch (Exception $e) {
    echo $e->getMessage();
}