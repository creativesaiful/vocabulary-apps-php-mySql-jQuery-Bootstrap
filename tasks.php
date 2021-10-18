<?php
session_start();
include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_set_charset($connection, "utf-8");

$action = $_POST['action'] ?? '';
$statusCode = 0;
if (!$connection) {
    throw new Exception("Database Connection Error");
} else {
    if ("register" == $action) {
        $email = htmlspecialchars($_POST['email']) ?? '';
        $pass = $_POST['password'] ?? '';

        if ($email & $pass) {
            $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
            $query = "INSERT INTO `users`( `email`, `pass`) VALUES ('$email','$pass_hash')";

            mysqli_query($connection, $query);
            $statusCode = 1;

            if (mysqli_error($connection)) {
                $statusCode = 2;
            }
        } else {
            $statusCode = 3;
        }
        header("location:index.php?status={$statusCode}");


    } else if ("login" == $action) {
        $email = htmlspecialchars($_POST['email']) ?? '';
        $pass = $_POST['password'] ?? '';

        if ($email & $pass) {
            $query = "SELECT * FROM `users` WHERE `email`='$email'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $_pass = $data['pass'];
                $id = $data['id'];
                if (password_verify($pass, $_pass)) {
                    $_SESSION['id']= $id;
                    header("location:word.php");
                    die();
                } else {
                    $statusCode = 6;
                }
            } else {
                $statusCode = 4;
            }
        } else {
            $statusCode = 5;
        }
        header("location:index.php?status={$statusCode}");
    }else if("addword"==$action){
        $word = htmlspecialchars($_REQUEST['word']) ?? '';
        $meaning = htmlspecialchars($_REQUEST['meaning']) ?? '';
        $user_id = $_SESSION['id'] ?? 0;

        if($word && $meaning && $user_id){
            $query = "INSERT INTO `words`( `user_id`, `words`, `meaning`) VALUES ($user_id,'$word','$meaning')";

            mysqli_query($connection, $query);

        }
        header("location:word.php");
    }
}
