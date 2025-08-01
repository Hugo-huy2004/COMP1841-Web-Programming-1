<?php
session_start();
include "../includes/DatabaseConnection.php";
require_once "../includes/DatabaseFunction.php";

$posts = getPostsByModule($pdo, $_GET['ModuleID']);
$module = getModuleByID ($pdo, $_GET['ModuleID']);
$title = 'Posts in ' . ($module['ModuleName']);
ob_start();
include '../templates/admin/modulePosts.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';