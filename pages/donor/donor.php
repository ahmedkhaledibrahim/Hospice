  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
 
    <link href="homeEdit.css" rel="stylesheet" type="text/css"/>
    
    <head>
        <title>HOME</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body class="background">
        <nav class="navbar bg-light navbar-dark text-light ">
            <img src="logo.png">
            <div class="btn-group ">
                
             
          
                 <button type="button" class="btn btn-basic"><a href="http://localhost/Hospice/login2.php" style="text-decoration: none; color: #666666">LOG OUT</a></button> 
            </div>   
        </nav>
        <div class="bg">
            <form method="post" style=" margin-left: 500px; margin-top: 100px; background-color: white; width: 345px; padding: 10px; height: 500px;  border-left: solid #4fa3db 10px; border-radius: 20px;">
                    
                <img src="logo.png" alt=""/>
                <br> <br> <br>
             <fieldset>
            <p>Choose Organ</p> 
                
                 <select name="organ" id="organ">
                        <option disabled="disabled" selected="selected">Organ</option>                  
                        <option value="heart">heart</option>
                        <option value="brain">brain</option>
                        <option value="lung">lung</option>
                        <option value="liver">liver</option>
                        <option value="kidney">kidney</option>
                        <option value="eye">eye</option>
                 </select>    
            <br> <br> <br>
            <input type="text" name="address" id="address" placeholder="Hospital">
                <br> <br> <br>
            <button type="submit" id="submit" name="submit" value="submit" class="btn btn-danger" style="margin-left: 105px;">Donor</button>
             
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
                $email1 = $_SESSION['emaildonor'];  
                $organ = $_POST['organ'];
                $address = $_POST['address'];
                $result = mysqli_query($connection, "INSERT INTO donor(Organ , DMail , address , state) VALUES ('$organ' , '$email1' , '$address' , 'available') ");
              }   
              ?>
           
            </div>
           
            
    </body>
</html>
