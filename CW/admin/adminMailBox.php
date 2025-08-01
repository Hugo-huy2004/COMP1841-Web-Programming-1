<?php
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";
session_start();
try{
    $title ="Mail Box";
    $notifications = getReceivedMailOfUser($pdo, $_SESSION['userID']);
    ob_start();
    include '../templates/admin/adminMailBox.html.php';
    $content = ob_get_clean();
    include '../templates/admin/adminLayout.html.php';
} catch (Exception $e){
    echo $e->getMessage();
}
