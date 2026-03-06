<?php

session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: ". $conn->connect_error);
}

if (isset($_POST["register"])) {
    if(isset($_POST["username"])){
        $username = $_POST["username"];
    }else{
        print "No username provided";
        exit;
    }
    if(isset($_POST["email"])){
        $email = $_POST["email"];
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
        $conn->query("INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')");
    }

    header("Location: login.php");
    exit();
} else{
    print "Nothing Entered";
}

if (isset($_POST["login"])) {
    $email = $_POST["username/email"];
    $password = $_POST["password"];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];

            if($user["role"] === "admin"){
                header("Location: admin.php");
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
