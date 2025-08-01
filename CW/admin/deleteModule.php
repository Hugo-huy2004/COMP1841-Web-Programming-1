<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

if (isset($_POST['ModuleID'])) {
    $moduleID =$_POST['ModuleID'];
    deleteModule($pdo, $moduleID);
    header("Location: adminDataFillter.php");
    exit();
}

header("Location: adminDataFillter.php");
exit();
