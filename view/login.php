<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Log in - OutdoorsMedia</title>
<link rel="stylesheet" href="../content/css/login.css">
</head>
<body>

<h2 style="text-align: center;">yourprofile.com</h2>

<div class="card">
  <form action="/action_page.php" method="post">
    <h3>ACCESS YOUR ACCOUNT</h3>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    
    <button type="submit">Login</button>
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
