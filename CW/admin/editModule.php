<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if(isset($_POST['ModuleName'])){
    editModule($pdo,$_POST['ModuleID'], $_POST['ModuleName'], $_POST['ModuleDiscription']);
    header('location: adminDatafillter.php');
}


$title = "Edit Module";
$module = getModuleByID($pdo,$_POST['ModuleID']);
ob_start();
include "../templates/admin/editModule.html.php";
$content = ob_get_clean();
include "../templates/admin/adminLayout.html.php";
