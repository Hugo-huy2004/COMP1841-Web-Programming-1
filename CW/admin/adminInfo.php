<?php
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";
$posts=getAllPost($pdo);
$title = 'Admin Infomation';
ob_start();
include '../templates/admin/adminInfo.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';
