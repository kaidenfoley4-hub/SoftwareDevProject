<?php
session_start();
include 'config.php';

if (isset($_POST["register"])) {
    if(isset($_POST["username"])){
        $username = $conn->real_escape_string($_POST["username"]);
    }else{
        print "No username provided";
        exit;
    }
    if(isset($_POST["email"])){
        $email = $conn->real_escape_string($_POST["email"]);
    }else{
        print "No email provided";
        exit;
    }
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $checkEmail = $conn->query("SELECT email FROM users WHERE email='$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email already exists';
        $_SESSION["active_form"] = 'register';
    }else {
        $conn->query("INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$password')");
    }

    header("Location: login.php");
    exit();
} else{
    print "Nothing Entered";
}

if (isset($_POST["login"])) {
    $email = $conn->real_escape_string($_POST["username/email"]);
    $password = $_POST["password"];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' OR username='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password_hash"])) {
            $_SESSION["name"] = $user["username"];
            $_SESSION["email"] = $user["email"];

            if($user["role"] === "admin"){
                header("Location: admin.html");
            }else {
                header("Location: UserProfile.html");
            }
            exit();
        }

        $_SESSION['register_error'] = 'Incorrect email or password';
        $_SESSION["active_form"] = 'login';
        header("Location: login.php");
        exit();
    }
}
?>