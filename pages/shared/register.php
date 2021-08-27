<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>REGISTER</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<link href="Rcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-image: url(home.jpg);  background-repeat: no-repeat;">
        
           <div class="Re">
               <form method="post" style="margin-left: 500px; margin-top: 10px; background-color: white; width: 345px; padding: 10px; height: 670px;  border-left: solid #4fa3db 10px; border-radius: 20px;">
               <img src="logo.png" alt=""/>
               <br> <br>
                   <fieldset>
                    <label>First Name<label/>
                    <input type ="text" id="first" name="first" placeholder="Your First Name" style="width: 280px; height: 60px;">
            
                    <label>Second Name<label/>
                    <input type ="text" id="second" name="second" placeholder="Your Second Name" style="width: 280px; height: 60px">
                    
                    <label>Email<label/>
                    <input type ="text" id="email" name="email" placeholder="Your Email" style="width: 280px; height: 60px">
                    
                    <label>Password<label/>
                    <input type ="password" id="pass" name="pass" placeholder="Password" style="width: 280px; height: 60px">
                    
                    
                    <label>Phone Number<label/>
                    <input type ="text" id="phone" name="phone" placeholder="Your Phone Number" style="width: 280px; height: 60px">
               
                  <br> <br>           
                   <select name="role" id="role">
                        <option disabled="disabled" selected="selected">Register As</option>                  
                        <option value="donor">donor</option>
                        <option value="patient">patient</option>
                    </select>    
                
                 <br> <br> 
                 <button type="submit" name="submit" class="btn btn-warning" style="margin-left: 100px;">Register</button>
            <fieldset/>
            
        </form>
               </div>
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
         $role = $_POST['role'];   
         $FirstName=filter_input(INPUT_POST, 'first');   
         $SecondName=filter_input(INPUT_POST, 'second');
         $Password=filter_input(INPUT_POST, 'pass');
         $Role=filter_input(INPUT_POST, 'role');
         $patient = 'patient';
         $phoneNumber=filter_input(INPUT_POST, 'phone');
         $Mail=filter_input(INPUT_POST, 'email');
         
         
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

        //$plain_txt = "Hello World!";
        #echo "Original Text =" .$pass. "\n";
        ?><br><br><?php
            $encrypted_txt = encrypt_decrypt('encrypt', $Password);
            
            //database//            
            $sql="INSERT INTO user(FirstName, SecondName, Password, Mail, PhoneNumber, Role) VALUES (?,?,?,?,?,?)";
            $result1 = $pdo->prepare($sql);
            $result1->execute(array($FirstName,$SecondName,$encrypted_txt,$Mail,$phoneNumber,$role));
            header("Location: login.php");
            
        #echo "Encrypted Text = " .$encrypted_txt. "\n";
            ?><br><br><?php
       
       #$sql="INSERT INTO user(FirstName, SecondName, Password, Mail, PhoneNumber, Role) VALUES ('$FirstName','$SecondName','$Password','$Mail','$phoneNumber','$Role')";
      
       #if (mysqli_query($connection, $sql)){
           
          if($role == "patient"){
           $result = mysqli_query($connection, "INSERT INTO patient(PMail , Feedback) VALUES ('$Mail' , 'None')");
            header("location: http://localhost/Hospice/login2.php");
          } 
          else if($role == "donor"){
           
          header("location: http://localhost/Hospice/login2.php");
          }
        } 
       #}
       
        ?>
         </div>
         <footer style=" margin-top: 200px; height: 250px; background: #131313; color: white; text-align: center;">
            <div class="container">
                <p>CONTACT WITH US:
                    <a href="www.twitter.com"><img src="twitter.png" style=" width: 50px; height:50px;"></a>
                    <a href="www.facebook.com"><img src="facebook.png" style="width: 40px; height:30px; margin-left: 8px;"></a>
                    <a href="www.gmail.com"><img src="gmail.png"  style="width: 40px; height:30px; margin-left: 8px;"></a>
                </p> 
            </div>
        </footer>
    </body>
</html>
