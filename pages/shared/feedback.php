  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <link href="feedbackcss.css" rel="stylesheet" type="text/css"/>
        <title>FEEDBACK</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
        
    
        <body style=" background-image: url(home.jpg);   background-repeat: no-repeat;" >
            
        
        <div class="bg">
            <form method="post" class="formEdit" style="height: 280px; width: 700px;">
                    
                <img src="logo.png" alt=""/>
                <br> <br> <br>
             <fieldset>
            <p style="margin-left: 300px;">FEEDBACK</p> 
                
                 
            <input type="text" name="feedback" id="feedback" placeholder="Write Your Feedback" style="height : 70px; width: 850px; margin-left: 130px;">
                <br> <br> 
            <button type="submit" id="submit" name="submit" value="submit" class="btn btn-danger" style="margin-left: 300px;">Send</button>
             
            <fieldset/>
            
         </form>
       
             <?php
              $connection= mysqli_connect('127.0.0.1', 'root', '', 'sec');
              if ($connection){
         
              } else{
              echo 'connection hasnt been succefully ';
              }
              if (isset($_POST['submit'])){
                session_start();
                $email1 = $_SESSION['emailpatient'];
                $feedback = $_POST['feedback'];
                $result = mysqli_query($connection, "UPDATE patient SET Feedback = '$feedback' WHERE PMail = '$email1'");
                }   
              ?>
           
            </div>
           
            
    </body>
</html>
