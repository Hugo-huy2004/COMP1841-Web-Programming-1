<?php
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

try {
    $posts = getAllPost($pdo);
    $modules = getAllModule($pdo);
} catch (Exception $e) {
    die('Lỗi khi truy vấn dữ liệu: ' . $e->getMessage());
}



$title = 'Admin Home Page';
ob_start();
include '../templates/admin/adminHome.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';
