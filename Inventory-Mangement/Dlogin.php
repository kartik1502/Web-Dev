<?php include('Dserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login | Inventory Management System</title>
  <link rel="stylesheet" type="text/css" href="Dstyle.css">
  <link rel="stylesheet" href="Demo.css">
</head>
<body>
  
<div class="imagel">
<form action="" class="forms">
            <h1>Inventory Management</h1>
                <p>Manage the way you like.....</p>
				<div class="design">
        <a href="#" class="logo"><img src="JK logo.jpg" alt="Karthik"></a>
    </div>
        </form> 
        
  <form method="post" action="Dlogin.php" class="login_box">
  <div class="header">
  	<h1>Login</h1>
  </div>
  	<?php include('Derrors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="submit-btn" name="login_user">Login</button>
  	</div>
  	<p>
	  	<a href="DforgotPassword.php" class="link">Forgot Password? </a><br><br>
  		Not yet a member? <a href="Dregister.php" class="link">Register</a>
  	</p>
  </form>
  </div>
</body>
</html>