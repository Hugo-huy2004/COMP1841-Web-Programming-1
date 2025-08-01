<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if (isset($_POST['Username'])) {

    $username = $_POST['Username'];
    $fullname = $_POST['Fullname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $address = $_POST['Address'];
    $phonenumber = $_POST['Phonenumber'];
    $role = $_POST['Role'];

    addNewUser($pdo, $username, $fullname, $email, $password, $address, $phonenumber, $role);

    header("Location: adminManageAccount.php");
    exit();
 
}

$title = 'Add New User';
ob_start();
include '../templates/admin/adminAddUser.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';



