<?php 
include "includes/DatabaseConnection.php";
include "includes/DatabaseFunction.php";
session_start();
try{
    if(isset($_FILES['userAvatar'])){
        upDateImage($pdo, 'User',
        'userAvatar',
        $_FILES['userAvatar']['tmp_name'],
        'userID',
        $_SESSION['userID']);
        $user = getUserByID($pdo, $_SESSION['userID']);
        $_SESSION['userAvatar']=$user['userAvatar'];
        headerManage($pdo, 'admin/adminInfo.php','member/memberInfo.php', $_SESSION['userID']);
    }

}catch (Exception $e){
    $content = $e->getMessage();
    if (isAdmin($pdo, $_SESSION['userID'])) {
        include 'templates/admin/adminLayout.html.php';
    } else {
        include 'templates/member/memberLayout.html.php';
    }
}