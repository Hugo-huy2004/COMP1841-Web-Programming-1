<?php
session_start();
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunction.php';

if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = getUserByEmail($pdo, $email);

        if ($user && $password == $user['Password'] || $user && password_verify($password, $user['Password'])) {
            session_start();
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Fullname'] = $user['Fullname'];
            $_SESSION['Email'] = $user['Email'];
            $_SESSION['Address'] = $user['Address'];
            $_SESSION['Phonenumber'] = $user['Phonenumber'];
            $_SESSION['Role'] = $user['Role'];
            $_SESSION['userAvatar'] = $user['userAvatar'];
            $_SESSION['createDate'] = $user['createDate'];
            
            if ($user['Role'] == 'admin') {
                header ('location: ../admin/adminHome.php');
                exit(); 
            } 
            if ($user['Role']== 'member') {
                header ('location: ../member/memberHome.php');
                exit();
            }
        } else {
            session_start();
            $_SESSION['error'] = "Username or password is incorrect, please check again!";
            header('location: loginPage.html.php');
            exit();
        }
} else {
    session_start();
    $_SESSION['error'] = "Username or password is incorrect, please check again!";
    header('location: loginPage.html.php');
    exit();
}
    


    