<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/367f78632e.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="/css/index.css">
</head>
<body>

    
<div class="card"">

    <div class="imgcontainer">
        <img src="/IMG_20170513_131944.jpg" alt="Profile Photo" class="avatar">
    </div>

  <h3>Rafael Pires</h3>
  <form action="">
      <label for="uname"><b>Name</b></label>
        <input type="text" placeholder="Enter new name" name="uname" required>
    
      <label for="title"><b>Title</b></label>
        <input type="text" placeholder="Enter new Title" name="title" required>

        <label for="description"><b>Description</b></label>
        <input type="text" placeholder="Add new Description" name="description" required>
        
        <h3>Links</h3>
        <label for="twtr"><b>Twitter</b></label>
        <input type="text" placeholder="Url to your Profile" name="twtr">

        <label for="lnkdn"><b>Linkedin</b></label>
        <input type="text" placeholder="Url to your Profile" name="lnkdn">

        <label for="fbook"><b>Facebook</b></label>
        <input type="text" placeholder="Url to your Profile" name="fbook">

        <h3>Security</h3>
        <label for="psw"><b>Change Password</b></label>
        <input type="password" placeholder="New Password" name="psw">

        <label for="confPsw"><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="confPsw">

  </form>
  <p><button type="submit">Save Changes</button></p>
  <p><button id="cancelbutton">Cancel</button></p>
</div>

</body>
</html>