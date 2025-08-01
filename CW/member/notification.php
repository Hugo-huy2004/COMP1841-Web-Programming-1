<?php
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";
session_start();
try{
    $title ="Notifications";
    $notifications = getReceivedMailOfUser($pdo, $_SESSION['userID']);
    ob_start();
    include '../templates/member/notification.html.php';
    $content = ob_get_clean();
    include '../templates/member/memberLayout.html.php';
} catch (Exception $e){
    echo $e->getMessage();
}
