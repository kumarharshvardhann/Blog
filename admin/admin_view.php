<?php  include('../connect.php'); ?>
	<?php include(root_path . '/admin/include/admin_functions.php'); ?>
	<?php include(root_path . '/include/top_section.php'); ?>
	<title>AdminView</title>
  <link rel="stylesheet" href="./style/style_sheet.css">

</head>
<body>
  <?php require_once(root_path.'/include/navbar.php'); ?> <!-- including the navbar portion of the file -->

	<div class="header">
		<div class="logo">
			<a href="<?php echo base_url .'admin/admin_view.php' ?>">
				<h1>Brook - Admin</h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp;
				<a href="<?php echo base_url . '/logout.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
	<div class="container adminview">
		<h1>Welcome</h1>
		<div class="statistics">
			<a href="users.php" class="first">
				<span>43</span> <br>
				<span>Registered users</span>
			</a>
			<a href="posts.php">
				<span>43</span> <br>
				<span>Published posts</span>
			</a>
			<a>
				<span>43</span> <br>
				<span>Published comments</span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="users.php">Add Users</a>
			<a href="posts.php">Add Posts</a>
		</div>
	</div>
</body>
</html>
