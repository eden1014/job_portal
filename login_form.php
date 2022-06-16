<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

  
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
  

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }elseif($row['user_type'] == 'company'){

         $_SESSION['user_name'] = $row['name'];
         header('location:job_insert.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
</head>  
<!-- header -->
<div class="nav">
        <h1 class="logo">JOB<span>SITE</span></h1>
        <ul>
        <li><a href="login_form.php">login</a></li>
        <li><a href="register_form.php">register</a></li>
        <li><a href="home.php">Home</a></li>
      </ul>
    </div>

<!-- header section ends -->



   
<div class="form-container">

   <form action="" method="post"name="form" onsubmit="return validateForm()">
      <h3>login now</h3>
      <?php
      
      ?>
      <input type="email" name="email"  placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>


    </main>
  
    
<script>
function validateForm() {
  let x = document.forms["form"]["email"].value;
  if (x == "") {
    alert("email must be filled out");
    return false;
  }
}
</script>

    

       
</body>
</html>