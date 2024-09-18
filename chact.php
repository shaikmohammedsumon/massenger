<?php 
    include "./config/config.php";
    session_start();
    if(!isset($_SESSION['auth_name'])){
        header("location: auth/login.php");
    }

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "SELECT * FROM register WHERE id='$id'";
        $result= mysqli_query($conn,$sql);
        $view = mysqli_fetch_assoc($result);
        
    }

    if(isset($_GET['id'])){
        $send_id = $_SESSION['auth_id'];
        $receive_id = $_GET['id'];
        $message = "SELECT * FROM massage ";
        $view_message= mysqli_query($conn,$message);

        }
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

   <section class="chat_section">
    <div class="section_body"  style="background-color: aquamarine;">
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
   </section>

   <section class="chat_body scrollable-div">
        <?php 
            foreach($view_message as $mass):
        ?>

        

            <?php 
            if($mass['send_id'] == $receive_id && $mass['receive_id'] == $send_id){ ?>
                <div class="chat_body_recive"> <p class="send"><?= $mass['send']?></p></div>
        
        <?php }
            if($mass['send_id'] == $send_id &&  $mass['receive_id'] == $receive_id ){ ?>
        
            <div class="chat_body_send"> <p class="receive"><?= $mass['send']?></p></div>
        

        <?php 
             } endforeach;
        ?>
       
   </section>
   



   <section class="footer_section scroll-container">

       <form action="massage.php" method="POST">
        <div class="footer">
            <div class="file_send">
                <img src="./image/attach-file.png" alt="">
            </div>
            <div class="text">
                    <input type="hidden" value="<?= $view['id']?>" name="receive">
                    <input type="hidden" value="<?= $_SESSION['auth_id'] ?>" name="send">

                    <input type="text" name="massage">
                </div>
                <div class="send_message">
                    <button type="submit" name="submit"> <img src="./image/send-message.png" alt=""></button>
                </div>
            </div>
        </form>
   </section>


    
</body>
</html>

<script>
        window.onload = function() {
            var div = document.querySelector('.scrollable-div');
            div.scrollTop = div.scrollHeight;
        };
</script>



