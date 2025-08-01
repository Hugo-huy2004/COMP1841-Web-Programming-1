<?php
session_start();
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

if (isset($_POST['commentID']) && isset($_POST['postID'])) {
    deleteComment($pdo, $_POST['commentID']);
    $postID = $_POST['postID'];
    $post = getPostByID($pdo, $postID);
    $comments = getCommentsByPost($pdo, $postID);
    $title = 'Comments';
    ob_start();
    include '../templates/member/commentMember.html.php';
    $content = ob_get_clean();
    include '../templates/member/memberLayout.html.php';
    exit();
}
$postID = $_POST['postID'];
$title = 'Comments';
ob_start();
include '../templates/member/commentMember.html.php';
$content = ob_get_clean();
include '../templates/member/memberLayout.html.php';