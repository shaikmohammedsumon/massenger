<?php 
    include "./config/config.php";
    session_start();
    if(!isset($_SESSION['auth_name'])){
        header("location: auth/login.php");
    }

    $sql = "SELECT * FROM register";
    $result= mysqli_query($conn,$sql);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

<section>
    <div class="hader_section">
        <div class="left_Header">
            <img src="./image/defualt.jpg" alt="">
        </div>
        <div class="right_Header">
            <h2><?php if(isset($_SESSION['auth_name'])) {echo $_SESSION['auth_name']; }else{echo "plicse Login";}?></h2>
        </div>
        <div class="logout">
        <a href="logout.php">LogOut</a>
        </div>
    </div>
</section>


   <section class="chat_section">
    <?php 
        foreach($result as $view):
            
            if($view['name'] == $_SESSION['auth_name']){
                continue;
            }
    ?>
    <a href="./chact.php?id=<?= $view['id']?>">
        <div class="section_body">
            <div class="body_left">
                <div class="profile_image_wrapper">
                    <img src="./image/defualt.jpg" alt="" class="profile_img">
                    <img src="./image/active.png" alt="" class="active_image">
    
                </div>
            </div> 
            <div class="body_right">
                <p><?= $view['name']?></p>
            </div>
        </div>
    </a>

    <?php 
        endforeach;
    ?>

    
</section>

   


    
</body>
</html>