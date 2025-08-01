<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";
try{
    if(isset($_POST['subject'])){
        sendMail($pdo,$_SESSION['userID'],$_POST['receiver'],$_POST['subject'],$_POST['message']);
        header('location: support.php');

    }

    $admins = getAllAdmins($pdo);
    ob_start();
    include '../templates/member/support.html.php';
    $content = ob_get_clean();
    include '../templates/member/memberLayout.html.php';
} catch (Exception $e) {
    echo $e->getMessage();
}