<?php
    $login = $_POST['username'];
    $password = $_POST['password'];
    if($login == "MrDew" && $password == "qwerty12345") {
        session_start();
        $_SESSION['admin'] = true;
        header("Location: ../adminpanel.html");
        exit();
    } else
        header("Location: ../login.html");
        exit();
    ?>