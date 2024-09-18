<?php 
    include "../config/config.php";
    session_start();

    if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conf_password = $_POST['confirm_password'];

        $name_regex = '/^(?! $)[a-zA-Z ]*$/';
        $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        $password_regex_lenght = '/^(?=\S{8,})/';
        $password_regex_uppercase = '/^(?=\S*[A-Z])/';
        $password_regex_lowercase = '/^(?=\S*[a-z])/' ;
        $password_regex_number = '/^(?=\S*[\d])/' ;
        $password_regex_cerecter = '/^(?=\S*[\W])/' ;

        $flag = false; 

        if(!$name){ // যদি ফাকা থাকে তাহলে error দেখাবে।  
            $_SESSION['name_error'] = "name field is Required!";
            $flag = true;
            $_SESSION['old_name'] = $name;
            header('location: register.php');

        }else if(!preg_match($name_regex,$name)){
            $_SESSION['name_error'] = "Use Only leter";
            $flag = true;
            $_SESSION['old_name'] = $name;
            header('location: register.php');
        }

        if(!$email){ // যদি ফাকা থাকে তাহলে error দেখাবে।  
            $_SESSION['email_error'] = "email field is Required!";
            $flag = true;
            header('location: register.php');
        }else if(!preg_match($email_regex, $email)){
            $_SESSION['email_error'] = "email_regex";
            $flag = true;
            header('location: register.php');
        }


        if(!$password){
            $_SESSION['password_error'] = "Email field is Required!!";
            $flag = true;
            header("location: register.php");
        }else if(!preg_match($password_regex_lenght,$password)){
            $_SESSION['password_error'] = "Password must be minimum 8 characters length*";
            $flag = true;
            header("location: register.php");
        }else if(!preg_match($password_regex_uppercase,$password)){
            $_SESSION['password_error'] = "Password must be at least one uppercase letter";
            $flag = true;
            header("location: register.php");
        }else if(!preg_match($password_regex_lowercase,$password)){
            $_SESSION['password_error'] = "Password must be at least one lowercase letter";
            $flag = true;
            header("location: register.php");
        }else if(!preg_match($password_regex_number,$password)){
            $_SESSION['password_error'] = "Password must be at least one number";
            $flag = true;
            header("location: register.php");
        }else if(!preg_match($password_regex_cerecter,$password)){
            $_SESSION['password_error'] = "Password must be which is non-word characters.";
            $flag = true;
            header("location: register.php");
        }

        if(!$conf_password){
            $_SESSION['conf_password_error'] = "Confirm password field is Required!!";
            $flag = true;
            header("location: register.php");
        }else if($conf_password != $password){
            $_SESSION['conf_password_error'] = "Confirm Password Crededsialdoesn't match!!";
            $flag = true;
            header("location: register.php");
        }



        if($flag){
            echo 'kharap';
        }else{
            $encript = md5($password);
            $registerQuery = "INSERT INTO register(name,email,password)VALUE('$name','$email','$encript')";
            mysqli_query($conn,$registerQuery);
           
            $_SESSION['email'] = $email;
            header('location: login.php');

            $_SESSION['password'] = $password;
            header("location: login.php");

        }

            

        




    }

?>