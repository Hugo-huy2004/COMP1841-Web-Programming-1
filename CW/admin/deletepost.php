<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if (!isset($_POST['id'])) {
    header("Location: adminHome.php");
    exit();
}

$postID = intval($_POST['id']);

if (deletePost($pdo, $postID)) {
    header("Location: adminHome.php?msg=deleted");
    exit();
} else {
    header("Location: adminHome.php?msg=delete_failed");
    exit();
}