<?php
  require_once '../controller/UsersController.php';
  $userController = new UsersController();
  $userController->saveUser();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../content/css/signup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
</head>
<body>

    <h2 style="text-align: center;">yourprofile.com</h2>

<div class="card">
  <form method="post">
    <h3>CREATE AN ACCOUNT</h3>

    <div class="container">
    <h4>Personal Information</h4>
    <label for="name" class="label"><b>Name</b></label>
    <input type="text" placeholder="Enter your Name" name="name" required>

    <label for="title" class="label">Title</label>
    <input type="text" placeholder="Enter your title" name="title" required>

    <label for="description" class="label">Description</label>
    <input type="text" placeholder="Enter your Description" name="description" required>
   
    <h4>Contacts</h4>
    <label for="email" class="label"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="link_twtr" class="label"><b>Twitter</b></label>
    <input type="text" placeholder="Your Twitter Link" name="link_twtr">

    <label for="link_fbook" class="label"><b>Facebook</b></label>
    <input type="text" placeholder="Your Facebook Link" name="link_fbook">

    <label for="link_lnkdn" class="label"><b>Linkedin</b></label>
    <input type="text" placeholder="Your Linkedin Link" name="link_lnkdn">

    <label for="link_github" class="label"><b>GitHub</b></label>
    <input type="text" placeholder="Your GitHub Link" name="link_github">
    
    <h4>Security</h4>
    <label for="password" class="label"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat" class="label"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <button name="form-submitted" type="submit" class="signupbtn" href="login.php" >Sign Up</button>

    <hr><p id="gotoreg">Already have an Account? <a href="login.php">Log in</a></p>
    <div class="clearfix">
      <a href="../index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </div>
  </div>
    </div>

  </form>
</div>
</body>
</html>