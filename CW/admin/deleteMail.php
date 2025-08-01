<?php
session_start();
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";


if (isset($_POST['MailID'])) {
    deleteMail($pdo, $_POST['MailID']);
}

header('Location: adminMailBox.php');
exit();