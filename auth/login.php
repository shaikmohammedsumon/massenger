<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            padding: 0 20px;

        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007BFF;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
        }
        .register-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="post_login.php" method="POST">
        <div class="form-group">
            <label for="email">Gmail</label>
            <input type="email" id="email" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'] ; }unset($_SESSION['email']) ?>">
            <?php if(isset($_SESSION['email_error'])):?>
                <p style="color:red;"><?= $_SESSION['email_error']?></p>
            <?php endif; unset($_SESSION['email_error'])?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'] ; }unset($_SESSION['password'])?>">
            <?php if(isset($_SESSION['password_error'])):?>
                <p style="color:red;"><?= $_SESSION['password_error']?></p>
            <?php endif; unset($_SESSION['password_error'])?>
        </div>
        <button type="submit" class="login-btn" name="submit">Login</button>
    </form>
    <div class="register-link">
        <p>Don't have an account? <a href="./register.php">Register here!!</a></p>
    </div>
</div>

</body>
</html>
