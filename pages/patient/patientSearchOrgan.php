<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
 
    <link href="searchOrganEdit.css" rel="stylesheet" type="text/css"/>
    
    <head>
        <title>SEARCH ORGAN</title>
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
         <form method="post" class="formEdit" style=" margin-left: 500px; margin-top: 100px; background-color: white; width: 345px; padding: 10px; height: 400px;  border-left: solid #4fa3db 10px; border-radius: 20px;;">
                    
                <img src="logo.png" alt=""/>
                <br> <br> <br>
             <fieldset>
                 <button type="submit" id="submit" name="submit" value="submit" class="btn btn-warning" style="margin-left: 80px;">Choose Organ</button>
                 <br> <br>
                 <select name="organ" id="organ" style="margin-left: 80px;">
                        <option disabled="disabled" selected="selected">Organ</option>                  
                        <?php
                        
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'sec');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';
                          }
                          
                           $result = mysqli_query($connection,"SELECT DISTINCT Organ , Did FROM donor WHERE state = 'available'");
 
                           while ($row = mysqli_fetch_array($result))
                           { 
                             echo '<option value ="'. $row['Did'] .'">  '. $row['Organ'] . '</option>';
                           }
                           
                        ?>
                 </select>    
                 <br> <br> <br>
                 
                 <select name="hospital" id="hospital" style="margin-left: 80px;">
                        <option disabled="disabled" selected="selected">Hospital</option>                  
                        <?php
                        
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'database1');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';
                          }
                           if (isset($_POST['submit'])){
                               session_start();    
                           $_SESSION['organ2'] = $_POST['organ'];    
                           $organ = $_POST['organ'];
                           $result = mysqli_query($connection,"SELECT DISTINCT address FROM donor WHERE Did = '$organ' ");
 
                           while ($row = mysqli_fetch_array($result))
                           { 
                             echo '<option value ="'. $row['address'] .'">  '. $row['address'] . '</option>';
                           }
                           }
                        ?>
                 </select>    
            
                   <br> <br> <br> 
                <button type="submit" id="submitall" name="submitall"  class="btn btn-danger" style="margin-left: 105px;">SUBMIT</button>
                       <?php
                          $connection= mysqli_connect('127.0.0.1', 'root', '', 'database1');
                          if ($connection){
         
                          } else{
                          echo 'connection hasnt been succefully ';
                          }
                           if (isset($_POST['submitall'])){
                               session_start();
                                $hospital = $_POST['hospital'];
                                $Did = $_SESSION['organ2'];
                                $result = mysqli_query($connection,"UPDATE donor SET state = 'notAvailable' WHERE Did = '$Did'");
                                $result2 = mysqli_query($connection,"SELECT DMail FROM donor WHERE Did = '$Did'");
                                $row5 = mysqli_fetch_assoc($result2);   
                                $dmail = $row5['DMail'];
                                echo "<script type='text/javascript'>alert('the hospital is :$hospital   //   donor email is : $dmail  ');</script>";
                               
                               }
                             ?>
                  
                <fieldset/>
            
          </form>
         </div>
       
                       
    </body>
</html>
