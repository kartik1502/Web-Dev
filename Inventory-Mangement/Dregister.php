<?php include('Dserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration | Inventory Management System</title>
  <link rel="stylesheet" type="text/css" href="Dstyle.css">
  <link rel="stylesheet" href="Demo.css">
</head>
<body>
  
<div class="image">
<form action="" class="forms">
            <h1>Inventory Management</h1>
                <p>Manage the way you like.....</p>
				<div class="design">
        <a href="#" class="logo"><img src="JK logo.jpg" alt="Karthik"></a>
    </div>
        </form>
        
  <form method="post" action="Dregister.php" class = "login_box">
  <div class="header">
  	<h1>Registration</h1>
  </div>
  	<?php include('Derrors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="submit-btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="Dlogin.php" class="link">Login</a>
  	</p>
  </form>
  </div>
</body>
</html>