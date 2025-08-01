<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if (isset($_POST['ModuleName'])) {
    $moduleName = $_POST['ModuleName'];    
    $moduleDiscription = $_POST['ModuleDiscription'];
    addModule($pdo, $moduleName, $moduleDiscription, date('Y-m-d'));
    header("Location: adminDataFillter.php");
    exit();
}


$modules = getModuleWithPostCount($pdo);

$posts = [];
if (isset($_GET['moduleID'])) {
    $posts = getPostsByModule($pdo, $_GET['moduleID']);
}

$title = 'Module Management';
ob_start();
include '../templates/admin/adminDataFillter.html.php';
$content = ob_get_clean();
include '../templates/admin/adminLayout.html.php';