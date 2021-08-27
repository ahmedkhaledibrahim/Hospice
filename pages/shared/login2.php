  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <link rel="stylesheet" href="editlogin.css" type="text/css">
    <head>
        <title>LOGIN</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
        <link rel="stylesheet" href="ucss.css"/>
    
        <body style=" background-color: grey;   background-repeat: no-repeat;">
        
        <div class="bg">
            <form method="post" class="formEdit">
                    
                <img src="logo.png" alt=""/>
                <br> <br>
             <fieldset>
            <label>Email<label/>
                <input type ="text" id="email" name="email" placeholder="Type Your Email" style="width: 280px; height: 60px;">
            
            <label>Password<label/>
                
                <input type ="password" id="pass" name="pass" placeholder=" Enter Your Password" style="width: 280px; height: 60px">
               
                <br> <br> <br>
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-danger" style="margin-left: 105px;">Login</button>
            
                <br> <br> <br>
            
             
            <fieldset/>
            
         </form>
       
             <?php
          $dsn = "mysql:host=localhost;dbname=sec;charset=utf8";
            $opt = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            $pdo = new PDO($dsn,'root','', $opt);
           
           $connection= mysqli_connect('127.0.0.1', 'root', '', 'sec');
          if ($connection){
         
          } else{
          echo 'connection hasnt been succefully ';
          }
         if (isset($_POST['submit'])){
            $user = $_POST['email'];
            $pass = $_POST['pass'];            
            $sql = mysqli_query($connection,"SELECT Password FROM user WHERE Mail = '$user'");
            $row1 = mysqli_fetch_assoc($sql);   
            $Passrole = $row1['Password'];
            function encrypt_decrypt($action, $string) {
            $output = false;

            $encrypt_method = "AES-256-CBC";
            $secret_key = 'sadgjakgdkjafkj';
            $secret_iv = 'This is my secret iv';

            $key = hash('sha256', $secret_key);
            
            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            if ( $action == 'encrypt' ) {
                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                $output = base64_encode($output);
            } else if( $action == 'decrypt' ) {
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }

            return $output;
            }
            $encrypted_txt = encrypt_decrypt('decrypt', $Passrole);
            #echo $encrypted_txt;

                  
               //if($count == 1){
               $query = mysqli_query($connection, "SELECT Role FROM user WHERE Mail = '$user' ");
               $row1 = mysqli_fetch_assoc($query);   
               $role = $row1['Role'];
               //$role = "patient";
               
               
               
//               $sql2 = "SELECT Role FROM user WHERE Role = '$role' AND Password LIKE '$encrypted_txt' AND Mail LIKE '$user' "  ;
//               $result2 = mysqli_query($connection, $sql2);  
//               $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);  
//               $count2 = mysqli_num_rows($result2);
               if ($role == "donor" && $pass==$encrypted_txt) {
                  session_start();
                 $_SESSION['emaildonor'] = $_POST['email']; 
                 header("location: http://localhost/Hospice/donor.php"); 
         }
              elseif ($role == "doctor" && $pass==$encrypted_txt) {
                 session_start();
                 $_SESSION['email2'] = $_POST['email']; 
               header("location: http://localhost/Hospice/home.php");
              
             }
             elseif ($role == "patient" && $pass==$encrypted_txt) {
                  session_start();
                  $_SESSION['emailpatient'] = $_POST['email']; 
                  header("location: http://localhost/Hospice/patienthome.php "); 
             }
             
              elseif ($role == "admin" && $pass==$encrypted_txt) {
                  session_start();
                  $_SESSION['emailpatient'] = $_POST['email']; 
                  header("location: http://localhost/Hospice/adminHome.php "); 
             }
         
             
        //}  
        else{  
            ?>
            <p style="color: red; ">Invalid Password or Email</p>
           <?php  
        }     
       }  
        
        ?>
             If you don't have an Email <a href="http://localhost/Hospice/register.php" <button  type="submit" class="btn btn-warning">Register</button> </a>
            </div>
            <footer class="footerEdit">
            <div class="container">
                <p>CONTACT WITH US:
                    <a href="www.twitter.com"><img src="twitter.png" class="imageLoge"></a>
                    <a href="www.facebook.com"><img src="facebook.png" class="imageLoge2"></a>
                    <a href="www.gmail.com"><img src="gmail.png" class="imageLoge2"></a>
                </p> 
            </div>
        </footer>
            
    </body>
</html>
