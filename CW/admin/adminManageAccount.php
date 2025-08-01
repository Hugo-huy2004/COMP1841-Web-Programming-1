<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";

$search = $_GET['search'] ?? '';
$Users = getAllMembers($pdo);

$title = "Admin Management";

ob_start();
include '../templates/admin/adminManageAccount.html.php';
$content = ob_get_clean();

include '../templates/admin/adminLayout.html.php';
