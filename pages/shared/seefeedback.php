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
                <button type="button" class="btn btn-basic "> <a href="http://localhost/Hospice/adminHome.php" style="text-decoration: none; color: #666666"><img src="home.png" alt="HOME" class="imageLoge2"></a> </button>
             
        
                 <button type="button" class="btn btn-basic"><a href="http://localhost/Hospice/login2.php" style="text-decoration: none; color: #666666">LOG OUT</a></button> 
            </div>   
        </nav>
  
       
                         <?php
                          session_start();
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'sec');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';}
                          
                         $sql2 = mysqli_query($connection, "SELECT PId , Feedback FROM patient");
                         
                         if ($sql2->num_rows > 0) {
                               
                           
                         echo "<table style='background-color : white; color : black; border: 1px solid black; margin-left : 30px; margin-top : 30px;'><tr><th>Patient_ID</th><th>Feedback</th></tr>";
                         // output data of each row
                         while($row = $sql2->fetch_assoc()) {
                            
                         echo "<tr style=' border: 1px solid black;'> <td >".$row["PId"]."</td><td>".$row["Feedback"]."</td><td>"."</td></tr>";
                         }
                         echo "</table>";
                         } else {
                         echo "THERE IS NO Patients.";
                         }
                         $connection->close();
      
                         ?>
    </body>
</html>
