<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if ($userID === 0 || $title === '' || $content === '' || $ModuleID === 0) {
    $_SESSION['error'] = 'Please fill all fields.';
    header('Location: adminHome.php');
    exit;
}

try {
    addPost($pdo, $_SESSION['userID'], $_POST['Title'], $_POST['Content'] ,$_POST['ModuleID'],$_FILES['PostImage']['tmp_name']);
    $_SESSION['success'] = 'Post added successfully.';
    header(header: 'Location: adminHome.php');

} catch (Exception $e) {
    $_SESSION['error'] = 'Error while adding post.';
    header(header: 'Location: adminHome.php');

}
exit;
