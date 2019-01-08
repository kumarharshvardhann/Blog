<?php  include('connect.php'); ?>
<?php  include('include/reg_login.php'); ?>
<?php  include('include/top_section.php'); ?>
	<title> Sign in </title>
</head>
<body>
<div class="container">


<div class="login">
  <div class="login_header" >
    Log In
  </div>
	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="login.php" >
			<?php include(root_path . '/include/errors.php') ?>
			<input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" class="btn" name="login_btn">Login</button>
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
			</p  >
		</form>
	</div>
</div>
</div>

	<?php include( root_path . '/include/footer.php'); ?>
