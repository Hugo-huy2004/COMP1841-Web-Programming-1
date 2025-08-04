<?php
if (!isset($_SESSION['Role'])) {
    header ('location: login/loginPage.html.php');
}