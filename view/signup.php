<?php
  require_once __DIR__ . '../controller/UsersController.php';
  $service = new UsersController();
  
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../content/css/signupstyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
</head>
<body>

    <h2>Create a Profile</h2>

<form action="/action_page.php" style="border:3px solid #ccc">
    <h3 style="margin-bottom: 0px;">Sign Up</h3>
  <div class="container">
    <p>Fill in this form to create a profile. It's Free!!!</p>
    <hr>
    <h4>Personal Information</h4>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter your Name" name="name" required>
   
    <h4>Contacts</h4>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <h4>Security</h4>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <button type="submit" class="signupbtn">Sign Up</button>

    <hr><p id="gotoreg">Already have an Account? <a href="login.php">Log in</a></p>
    <div class="clearfix">
      <a href="../index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </div>
  </div>
</form>

</body>
</html>