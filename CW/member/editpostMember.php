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
    header('location: memberHome.php');
    exit();
}

$post = getPostById($pdo, $_POST['PostID']);
$modules = getAllModule($pdo);
$title = 'Edit Post';
ob_start();
include '../templates/member/editpostMember.html.php';
$content = ob_get_clean();
include '../templates/member/memberLayout.html.php';
?>