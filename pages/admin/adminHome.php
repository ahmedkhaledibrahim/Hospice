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
        
    <head>
        <link href="Admincss.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>MY APPOINTMENTS</title>
    </head>
    <body class="background" style="background-image: url('home.jpg'); ">
        
        <nav class="navbar bg-light navbar-dark text-light ">
            <img src="logo.png">
            <div class="btn-group ">
             
                
                
               
                 <button type="button" class="btn btn-basic"><a href="http://localhost/Hospice/login2.php" style="text-decoration: none; color: #666666">LOG OUT</a></button> 
            </div>   
        </nav>
        <button type="button" class="btn btn-danger button" style="margin: 10px;"><a href="http://localhost/Hospice/appointmentsInfo.php" style="text-decoration: none; color: white;">APPOINTMENTS INFO</a></button>
        <button type="button" class="btn btn-danger button" style="margin: 10px;"><a href="http://localhost/Hospice/seefeedback.php" style="text-decoration: none; color: white;">PATIENTS FEEDBACK</a></button>
           <div class="Re">
               <form method="post" style="margin-left: 500px; margin-top: 10px; background-color: white; width: 345px; padding: 5px; height: 750px;  border-left: solid #4fa3db 10px; border-radius: 20px;">
               <img src="logo.png" alt=""/>
               <br> <br>
                   <fieldset>
                    <label>First Name<label/>
                    <input type ="text" id="first" name="first" placeholder="Doctor First Name" style="width: 280px; height: 60px;">
            
                    <label>Second Name<label/>
                    <input type ="text" id="second" name="second" placeholder="Doctor Second Name" style="width: 280px; height: 60px">
                    
                    <label>Email<label/>
                    <input type ="text" id="email" name="email" placeholder="Doctor Email" style="width: 280px; height: 60px">
                    
                    <label>Password<label/>
                    <input type ="password" id="pass" name="pass" placeholder="Password" style="width: 280px; height: 60px">
                    
                    
                    <label>Phone Number<label/>
                    <input type ="text" id="phone" name="phone" placeholder="Doctor Phone Number" style="width: 280px; height: 60px">
                    
                    <label>Address<label/>
                    <input type ="text" id="address" name="address" placeholder="Doctor Address" style="width: 280px; height: 60px">
               
                  <br> <br>           
                   <select name="role" id="role">
                        <option disabled="disabled" selected="selected">Register As</option>                  
                        <option value="family physician">family physician</option>
                        <option value="pediatrician">pediatrician</option>
                        <option value="surgeon">surgeon</option>
                        <option value="psychiatrist">psychiatrist</option>
                        <option value="cardiologist">cardiologist</option>
                        <option value="Infectious Disease Physician">Infectious Disease Physician</option>
                        <option value="Neurologist">Neurologist</option>
                        <option value="Nephrologist">Nephrologist</option>
                        <option value="Radiologist">Radiologist</option>
                    </select>    
                
                 <br> <br> 
                 <button type="submit" name="submit" class="btn btn-warning" style="margin-left: 100px;">ADD DOCTOR</button>
            <fieldset/>
            
        </form>
               </div>
        <?php
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
         $address=filter_input(INPUT_POST, 'address');
         
         
         
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
         
         $encrypted_txt = encrypt_decrypt('encrypt', $Password);   
         $phoneNumber=filter_input(INPUT_POST, 'phone');
         $Mail=filter_input(INPUT_POST, 'email');
       
         $sql = mysqli_query($connection,"INSERT INTO user(FirstName, SecondName, Password, Mail, PhoneNumber, Role) VALUES ('$FirstName','$SecondName','$encrypted_txt','$Mail','$phoneNumber','doctor')");
         $sql2= mysqli_query($connection, "INSERT INTO doctor(DocMail, Specialize , Address) VALUES ('$Mail', '$role' , '$address')");
          
        }
        ?>
        
        
         </div>
        
    </body>
</html>
