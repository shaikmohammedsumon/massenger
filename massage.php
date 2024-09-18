<?php 
    include "./config/config.php";

    if(isset($_POST['submit'])){
      $message = $_POST['massage'];
      $send = $_POST['send'];
      $receive = $_POST['receive'];

      if($message){
        
        $registerQuery = "INSERT INTO massage(send,send_id,receive_id)VALUE('$message','$send','$receive')";
        mysqli_query($conn,$registerQuery);
        header("location: chact.php?id=$receive");

      }
        

    }

?>