<?php

$conn = mysqli_connect('localhost', 'root', '','school');

session_start();

if(isset($_POST['submit'])){

   $id = $_POST['id'];
   $password = $_POST['password'];
   

   $select = " SELECT * FROM std_form WHERE id = '$id' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:adimnpage.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:Home.php');

      }
     
   }
   else{
      $error[] = 'Incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="lstyle.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h3>Sign Up</h3>
            <form action="" method="post">
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
        
            <br>
            <div class="inputbox">
                <input type="text" name="id" Id="id" required="required">
                <span>School ID</span>
            </div>
            <br><br>
            <div class="inputbox">
                <input type="password" name="password" Id="password" required="required">
                <span>Password</span>
            </div>
            <br><br>
            <div>
            <button type="submit" name="submit"class="btn">Login</button>
            </div>
            <br><br>
            <div>
                <p>Don't have an account? <a href="reg.php">Register now</a></p>
            </div>
            </form>
        </div>
    </div>
</body>
</html>