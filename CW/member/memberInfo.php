<?php
include "../includes/DatabaseConnection.php";
include "../includes/DatabaseFunction.php";
$title = 'Infomation';
ob_start();
include '../templates/member/memberInfo.html.php';
$content = ob_get_clean();
include '../templates/member/memberLayout.html.php';

