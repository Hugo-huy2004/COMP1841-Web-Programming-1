<?php
session_start();
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

if (isset($_POST['commentID']) && isset($_POST['postID'])) {
    deleteComment($pdo, $_POST['commentID']);
    $postID = intval($_POST['postID']);
    $post = getPostByID($pdo, $postID);
    $comments = getCommentsByPost($pdo, $postID);
    $title = 'Comments';
    ob_start();
    include '../templates/admin/comment.html.php';
    $content = ob_get_clean();
    include '../templates/admin/adminLayout.html.php';
    exit();
}
$postID = intval($_POST['postID'] ?? $_GET['postID'] ?? 0);
$post = ($postID > 0) ? getPostByID($pdo, $postID) : null;
$comments = ($postID > 0) ? getCommentsByPost($pdo, $postID) : [];
$title = 'Comments';
ob_start();
include '../templates/admin/comment.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';