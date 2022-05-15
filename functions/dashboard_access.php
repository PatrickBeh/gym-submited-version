<?php
    ob_start();
    session_start();
require('db_link.php');
require('functions.php');
$func = new allFunctions();

if (isset($_POST['btn_login'])) {

    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['pwd']);

    if (empty($username)) {

        $_SESSION['error_login'] = "Please enter username";
        header("location: ../index.php");
    } else if (empty($password)) {
        $_SESSION['error_login'] = "Please enter password";
        header("location: ../index.php");
    } else {

        $select_stmt = $pdo->prepare("SELECT * FROM tb_user WHERE username=:username");
        $select_stmt->bindParam(':username', $username);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($select_stmt->rowCount() > 0) {
            if ($username == $row["username"]) {

                if ($func->password_verify($password, $row["password"])) {
                    $_SESSION['user_login'] = $row["id"];
                    $loginMsg = "Successfully Login";

                    if ($row['user_type_id'] == 'admin') {
                        header("location: ../dashboard/dashboard_create_user.php");
                    } else if ($row['user_type_id'] == 'staff') {
                        header("location: ../dashboard/dashboard_create_user_staff.php");
                    } else {
                        header("location: ../dashboard/dashboard_user.php");
                    }
                } else {
                    $_SESSION['error_login'] = "wrong password";
                    header("location: ../index.php");
                    // Create alert to show the error message
                }
            } else {
                $_SESSION['error_login'] = "wrong username";
                header("location: ../index.php");
            }
        } else {
            $_SESSION['error_login'] = "wrong username";
            header("location: ../index.php");
        }
    }
}
