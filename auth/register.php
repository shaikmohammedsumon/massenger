<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        .register-container {
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
        .register-btn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .register-btn:hover {
            background-color: #0056b3;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
        .login-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Register</h2>
    <form action="post_register.php" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php if(isset($_SESSION['old_name'])){echo $_SESSION['old_name'];} unset($_SESSION['old_name'])?>">
            <?php if(isset($_SESSION['name_error'])):?>
                <p style="color:red;"><?= $_SESSION['name_error']?></p>
            <?php endif; unset($_SESSION['name_error'])?>
        </div>


        <div class="form-group">
            <label for="email">Gmail</label>
            <input type="email" id="email" name="email" value="<?php if(isset($_SESSION['old_email'])){echo $_SESSION['old_email'];} unset($_SESSION['old_email'])?>">
            <?php if(isset($_SESSION['email_error'])):?>
                <p style="color:red;"><?= $_SESSION['email_error']?></p>
            <?php endif; unset($_SESSION['email_error'])?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?php if(isset($_SESSION['old_password'])){echo $_SESSION['old_password'];} unset($_SESSION['old_password'])?>">
            <?php if(isset($_SESSION['password_error'])):?>
                <p style="color:red;"><?= $_SESSION['password_error']?></p>
            <?php endif; unset($_SESSION['password_error'])?>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" value="<?php if(isset($_SESSION['old_con_password'])){echo $_SESSION['old_con_password'];} unset($_SESSION['old_con_password'])?>">
            <?php if(isset($_SESSION['conf_password_error'])):?>
                <p style="color:red;"><?= $_SESSION['conf_password_error']?></p>
            <?php endif; unset($_SESSION['conf_password_error'])?>
        </div>
        <button type="submit" class="register-btn" name="submit">Register</button>
    </form>
    <div class="login-link">
        <p>Already have an account? <a href="./login.php">Go to Login !!</a></p>
    </div>
</div>

</body>
</html>
