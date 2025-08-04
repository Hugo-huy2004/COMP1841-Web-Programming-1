<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if (!isset($_POST['id'])) {
    header("Location: memberHome.php");
    exit();
}
$postID = intval($_POST['id']);

if (deletePost($pdo, $postID)) {
    header("Location: memberHome.php?msg=deleted");
    exit();
} else {
    header("Location: memberHome.php?msg=delete_failed");
    exit();
}