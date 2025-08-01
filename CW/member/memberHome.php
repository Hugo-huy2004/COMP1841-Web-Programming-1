<?php
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

try {
    $posts = getAllPost($pdo);
    $modules = getAllModule($pdo);
    $title = 'Member Home Page';
    ob_start();
    include '../templates/member/memberHome.html.php';
    $content = ob_get_clean();
    include '../templates/member/memberLayout.html.php';
} catch (Exception $e) {
    $content = '<p>Error'. $e -> getMessage() .'</p>';
    include '../templates/member/memberLayout.html.php';
}




