<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <link href="patientEdit.css" rel="stylesheet" type="text/css"/>
    <style>
        th, td {
  padding: 15px;
   border: 1px solid black;
  border-collapse: collapse;

  width: 260px;
 }

    </style>
    <head>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>PATIENTS</title>
    </head>
    <body class="background">
        <nav class="navbar bg-light navbar-dark text-light ">
            <img src="logo.png">
            <div class="btn-group ">
             
                <button type="button" class="btn btn-basic "> <a href="http://localhost/Hospice/home.php" style="text-decoration: none; color: #666666"><img src="home.png" alt="HOME" class="imageLoge2"></a> </button>
               
                
                 <button type="button" class="btn btn-basic"><a href="http://localhost/Hospice/login2.php" style="text-decoration: none; color: #666666">LOG OUT</a></button> 
            </div>   
        </nav>
        <br> <br>
        <form method="post" style="padding : 10px;">
               
                   <fieldset>
                        <button type="submit" name="submit"  class="btn btn-primary" >Search patient ID</button>
                        <br><br>
                       <input type="text" name="pid" id="pid" placeholder="Patient ID">
                       <br> <br>
                        <?php
                          session_start();
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'sec');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';
                          }
                          
                          if (isset($_POST['submit'])){
                              
                          $email = $_SESSION['email2'];
                          $pid = $_POST['pid'];
                          
                            
                          $result6 = mysqli_query($connection, "SELECT DocId FROM doctor WHERE DocMail  = '$email'");
                          $row5 = mysqli_fetch_assoc($result6);   
                          $doc2 = $row5['DocId'];
                          
                          
                          
                          
                          //$sql2 = mysqli_query($connection,"UPDATE book SET State = 'attended'  WHERE AppId = '$appid'");
                          //$sql = mysqli_query($connection, "UPDATE appointment SET State = 'attended'  WHERE AppId = '$appid'");
                          
                          
                          $result3 = mysqli_query($connection, "SELECT AppId FROM book WHERE PId  = '$pid'");
                          $row4 = mysqli_fetch_assoc($result3);   
                          $doc = $row4['AppId'];
                          //$date = date('Ymd');
                          $result = mysqli_query($connection,"SELECT Date  FROM appointment WHERE State = 'attended' AND AppId = '$doc' AND DocId = '$doc2' ; ") ;
                          
                          
                          $result2 = mysqli_query($connection,"SELECT PId FROM book WHERE State = 'attended' AND AppId = '$doc' ; ") ;                          
                          $row2 = mysqli_fetch_assoc($result2);
                          $pid1 = $row2['PId'];
                          
                          if ($result->num_rows > 0) {
                               
                           
                          echo "<table style='background-color : black;'><tr><th>Patient_ID</th><th>Last Appointment</th></tr>";
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            
                          echo "<tr> <td>".$row2["PId"]."</td><td>".$row["Date"]."</td></tr>";
                          }
                         echo "</table>";
                         } 
                         }
                         $connection->close();
                         ?>
                        
            <fieldset/>
              
        </form>
        
      <?php 
      
      ?>
    </body>
</html>
