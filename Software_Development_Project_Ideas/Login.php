<?php

session_start();

$errors = [
        'login' => isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '',
        'register' => isset($_SESSION['register_error']) ? $_SESSION['register_error'] : ''
];
$activeForm = isset($_SESSION['active_form']) ? $_SESSION['active_form'] : 'login';

session_unset();

function showError($error) {
    return !empty($error) ? '<div class="alert alert-danger" role="alert">'.$error.'</div>' : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intentional Dating Login & Registration</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login',$activeForm);?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?>
                <label>
                    <input type="text" placeholder="Username/Email" name="username/email" required>
                </label>
                <label>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="checkbox" onclick="showPassword()">ShowPassword
                </label>
                <button type="submit" name="login">Login</button>
                <p>Don't have an Account? <a href="#" onclick="showFrom('Register-form')">Register</a></p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register',$activeForm);?>"" id="Register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?>
                <label>
                    <input type="text" placeholder="Username" name="username" required>
                </label>
                <label>
                    <!--Password Field-->
                    <input type="text" placeholder="Email" name="email" required>
                </label>
                <label>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="checkbox" onclick="showPassword()">ShowPassword
                </label>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showFrom('login-form')">Login</a></p>
            </form>
        </div>
    <script src="Login.js"></script>
</body>
</html>