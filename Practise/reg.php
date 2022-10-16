<?php
$conn = mysqli_connect('localhost', 'root', '','school');

// When form submitted, insert values into the database.
if(isset($_POST['submit'])){

    $id =  $_POST['id'];
    $Email =  $_POST['Email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];
 
    $select = " SELECT * FROM std_form WHERE email = '$Email' && password = '$password' ";
 
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'user already exist!';
 
    }else{
 
       if($password != $cpassword){
          $error[] = 'password not matched!';
       }else{
          $pro = "INSERT INTO std_form(id, Email, password, user_type) VALUES('$id','$Email','$password','$user_type')";
          $result   = mysqli_query($conn, $pro);
          if ($result) {
              echo 'You are registered successfully';
              header('location:login.php');      
          }
          
       }
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration Form</title>

   <link rel="stylesheet" href="rstyle.css">

</head>
<body>
   
<div class="Container">
  <div class="card">
    <h3>Register Now</h3>
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
            <input type="number" name="id" Id="id" required="required" >
            <span>ID number</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="Email" name="Email" Id="Email" required="required" >
            <span>Email</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="password" name="password" Id="password" required="required">
            <span>Password</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="password" name="cpassword" required="required" >
            <span>Confirm password</span>
        </div>
        <br><br>
        <div class="inputbox">
            
            <select name="user_type">
                <option value="user">Student</option>
                <option value="admin">Admin</option>
             </select>
             <span>User Type</span>
        </div>
        <br><br>
        <div>
        <button type="submit" name="submit"class="btn">Register</button>
        </div>
        </form>
            
            
            <div>
              <p>Already have an account? <a href="login.php">Login now</a></p>
        
        
      </div>
    

</div>

</body>
</html>