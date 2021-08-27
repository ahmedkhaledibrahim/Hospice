<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <style>
        th, td {
  padding: 15px;
   border: 1px solid black;
  border-collapse: collapse;

  width: 260px;
 }

    </style>
        <link href="appointEDITING.css" rel="stylesheet" type="text/css"/>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>MY APPOINTMENTS</title>
    </head>
    <body class="background">
        <nav class="navbar bg-light navbar-dark text-light ">
            <img src="logo.png">
            <div class="btn-group ">
             
                <button type="button" class="btn btn-basic "> <a href="http://localhost/Hospice/home.php" style="text-decoration: none; color: #666666"><img src="home.png" alt="HOME" class="imageLoge2"></a> </button>
                
               
                 <button type="button" class="btn btn-basic"><a href="http://localhost/Hospice/login2.php" style="text-decoration: none; color: #666666">LOG OUT</a></button> 
            </div>   
        </nav>
             <?php
                          session_start();
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'sec');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';}
                          $email=$_SESSION['email2'];
                          $result3 = mysqli_query($connection, "SELECT DocId FROM doctor WHERE DocMail = '$email'");
                          $row4 = mysqli_fetch_assoc($result3);   
                          $doc = $row4['DocId'];
                          $date = date('Ymd');
                          $result = mysqli_query($connection,"SELECT Date, Time, AppId FROM appointment WHERE State = 'true' AND Date > '$date' AND DocId = '$doc' ; ") ;
                          $result2 = mysqli_query($connection,"SELECT Date, Time, AppId FROM appointment WHERE State = 'true' AND Date > '$date' AND DocId = '$doc' ; ") ;
                          
                          
                          
                         $row2 = mysqli_fetch_assoc($result2);
                         $appid = $row2['AppId'];
                         $sql2 = mysqli_query($connection, "SELECT PId FROM book WHERE AppId = '$appid'");
                         $row3 = mysqli_fetch_assoc($sql2);   
                         $pid = $row3['PId'];
                         if ($result->num_rows > 0) {
                               
                           
                         echo "<table style='background-color : black;'><tr><th>Date</th><th>Time</th><th>Patient_ID</th><th>Appointment_ID</th></tr>";
                         // output data of each row
                         while($row = $result->fetch_assoc()) {
                            
                         echo "<tr> <td>".$row["Date"]."</td><td>".$row["Time"]."</td><td>".$row3["PId"]."</td><td>".$row["AppId"]."</td></tr>";
                         }
                         echo "</table>";
                         } else {
                         echo "THERE IS NO APPOINTMENTS.";
                         }
                         $connection->close();
      
                         ?>
                         <br> <br>
                         <form method="post" style="padding : 10px";>
               
                         <fieldset>
                       
                         <input type="text" name="appid" id="appid" placeholder="Appointment ID">
                         <?php
                        
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'database1');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';
                          }
                          
                          if (isset($_POST['submit'])){
                          $appid = $_POST['appid'];
                          $appid2 = $_POST['appid'];
                          
                          $sql2 = mysqli_query($connection,"UPDATE book SET State = 'attended'  WHERE AppId = '$appid'");
                          $sql = mysqli_query($connection, "UPDATE appointment SET State = 'attended'  WHERE AppId = '$appid2'");
                          }
                 ?>
                         <button type="submit" name="submit"  class="btn btn-primary" >Confirm Attendance</button>
            <fieldset/>
              
        </form>
       
        </footer>
       
    </body>
</html>
