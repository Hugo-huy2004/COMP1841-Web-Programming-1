<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if (isset($_POST['Fullname'])) {
    $fullname = $_POST['Fullname'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $phonenumber = $_POST['Phonenumber'];
    $userID = $_POST['userID'];
    updateUserInfo($pdo, $userID, $fullname, $email, $address, $phonenumber);
    $userById = getUserByID($pdo, $userID);
    $_SESSION['Fullname'] = $userById['Fullname'];
    $_SESSION['Email'] = $userById['Email'];
    $_SESSION['Address'] = $userById['Address'];
    $_SESSION['Phonenumber'] = $userById['Phonenumber'];
    header('Location: ../admin/adminInfo.php');
    exit();
}
$title = 'Edit Admin Information';
ob_start();
include '../templates/admin/editAdminInfo.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';