<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="patientCancelEdit.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>CANCEL BOOK</title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body class="background">
        <nav class="navbar bg-light navbar-dark text-light ">
            <img src="logo.png">
            <div class="btn-group ">
                <button type="button" class="btn btn-basic "> <a href="http://localhost/Hospice/patienthome.php" style="text-decoration: none; color: #666666"><img src="home.png" alt="HOME" class="imageLoge2"></a> </button>
             
                  
                 <button type="button" class="btn btn-basic"><a href="http://localhost/Hospice/login2.php" style="text-decoration: none; color: #666666">LOG OUT</a></button> 
            </div>   
        </nav>
     
   <div>
        <form method="post" style="margin-left: 500px; margin-top: 40px; background-color: white;  width: 450px; padding: 10px; height: 270px;  border-left: solid #4fa3db 10px; border-radius: 20px;">
               <img src="logo.png" alt=""/>
               <br> <br>
                   <fieldset>
                       
                            
            
            
             <br> <br>     
             
             <!-- CHOOSE SPECIALIZATION ///////////////////////////////////////////////////////////////////// -->
             
             <input type="text" name="appid" id="appid" placeholder="Appointment ID">
                        <?php
                        
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'sec');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';
                          }
                          
                          if (isset($_POST['submit'])){
                          $appid = $_POST['appid'];
                          $sql = mysqli_query($connection,"DELETE FROM book WHERE AppId = '$appid' ") ;
                          $sql2 = mysqli_query($connection,"UPDATE appointment SET STATE = 1 WHERE AppId = '$appid'");
                          }
                         ?>
                         <button type="submit" name="submit"  class="btn btn-primary" >Enter</button>
            <fieldset/>
              
        </form>
   </div>
        
    </body>
</html>
