<?php
require_once '../controller/UsersController.php';
$userController = new UsersController();
$userController->saveUser();
session_start();

if (isset($_SESSION['id'])) {
    // If user is already logged in, redirect to dashboard or authorized page
    header("Location: users.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform login validation and authentication here
    if (empty($username) || empty($password)) {
      $error = "Please enter a username and password.";
    } else {
      // Perform authentication against your data source (e.g., database)
      // Assuming you have a UserRepository with a method like authenticate($username, $password)
      $user = $userRepository->authenticate($username, $password);
  
      if ($user) {
          // Authentication successful
          // Assign the authenticated user object to $user
      } else {
          // Invalid username or password
          $error = "Invalid username or password.";
      }
  }
    // Assuming $user is the authenticated user object
    
    if ($user) {
        // Successful login
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        // Add any other relevant user information to session variables
        
        header("Location: dashboard.php"); // Redirect to dashboard or authorized page
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="../content/css/login.css">
  </head>
<body>

<h2 style="text-align: center;">yourprofile.com</h2>

<div class="card">
  <form method="post" action="login.php">
    <h3>ACCESS YOUR ACCOUNT</h3>

    <div class="container">
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter your Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
          
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      
      <button type="submit" >Login</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
      <hr><p id="gotoreg">Don't have an Account? <a href="signup.php">Create one</a></p>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <a href="../index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </div>
  </form>
</div>

</body>
</html>
