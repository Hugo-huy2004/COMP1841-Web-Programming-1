<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if(isset($_POST['Title'])){
    updatePost($pdo, 
        $_POST['postID'], 
        $_POST['Title'], 
        $_POST['Content'], 
        $_POST['ModuleID']);
    header('location: adminHome.php');
    exit();
}

$post = getPostById($pdo, $_POST['PostID']);
$modules = getAllModule($pdo);
$title = 'Edit Post';
ob_start();
include '../templates/admin/editpost.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';
?>