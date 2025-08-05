<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if (isset($_POST['repContent'])) {
    $postID = $_POST['postID'];
    $userID = $_SESSION['userID'];
    $repContent = trim($_POST['repContent']);
    addComment($pdo, $postID, $userID, $repContent);
    $post = getPostByID($pdo, $postID);
    $comments = getCommentsByPost($pdo, $postID);
    $title = 'Add comment';
    ob_start();
    include '../templates/member/commentMember.html.php';
    $content = ob_get_clean();
    include '../templates/member/memberLayout.html.php';
    exit();
}

$postID = $_POST['postID'];
$post = getPostByID($pdo, $postID);
$comments = getCommentsByPost($pdo, $postID);
$title = 'Add comment';
ob_start();
include '../templates/member/commentMember.html.php';
$content = ob_get_clean();
include '../templates/member/memberLayout.html.php';

