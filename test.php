

<?php require_once('connect.php'); ?>
<?php require_once(root_path.'/include/function.php'); ?>
<?php
	if(isset($_GET['post-slug']))	{
		$post = get_single_post($_GET['post-slug']);
		echo($_GET['post-slug']);
}
	else
		echo "Nothing set!";
?>
<?php require_once(root_path.'/include/top_section.php') ?>
	<title><?php echo $post['title']; ?></title>
<center><h2><?php echo $post['title']; ?></h2></center>
</head>
<body>
	<div class="page_container">
		
	</div>
	<p>
		<img src="<?php echo $post['image']; ?>">
		<?php echo $post['body']; ?>
	</p>
<?php require_once(root_path.'/include/footer.php'); ?>




