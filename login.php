<?php require('session.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="css/styles_login.css?v=<?php echo time(); ?>">

</head>
<?php
 if (logged_in()) {
?>
   <script type="text/javascript">
            window.location = "adminpanel.php";
    </script>
    <?php
}
?>
<body>
   <h3 style="text-align: center; color: red;">1) CONNECT PERSONAL DETAILS TO UDPATE INFORMATION BUTTON</h3>
   <h3 style="text-align: center; color: red;">2) CREATE LOGIN CREDS FOR PARENTS ALSO!</h3>

  <div class="bg-image" style="background-image: url('images/bg.jpg');"></div>

  <!-- <div class="bg-text">
    
    <h1>Login</h1>
    <form action="#" method="POST">
      <input type="text" placeholder="username" class="field">
      <input type="password" placeholder="password" class="field" style="margin-top: 10px;">
      <input type="submit" value="login" class="btn" style="margin-top: 30px;">
    </form>
    
    <div class="pass-link"  style="margin-top: 10px;">
      <a href="#" >Lost your password?</a>
    
    </div>  
  </div> -->

  <div class="container">
    <h1 style="color: white;">Login</h1>
    
    <form action="processlogin.php" method="POST">
      <input type="text" name="uname" placeholder="username" class="field">
      <input type="password" name="pass" placeholder="password" class="field" style="margin-top: 10px;">
      <input type="submit" value="LOGIN" name="btnlogin" class="btn" style="margin-top: 30px; font-size: 25px;">
    </form>
    
    <!-- <div class="pass-link">
      <a href="" >Lost your password?</a>
    </div>  --> 
  </div>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript">
    AOS.init();
  </script>
</body>
</html>
