<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";


if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];
    deleteUserById($pdo, $userID);
}

header('Location: adminManageAccount.php');
exit();