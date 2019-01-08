<?php require_once('connect.php'); ?>
<?php require_once(root_path.'/include/function.php'); ?>
<?php $comments = fetch_comment($_GET['post-slug']);?>
<?php
	if(isset($_GET['post-slug']))	{
		$post = get_single_post($_GET['post-slug']);
}
	else
		echo "Nothing set!";
?>
<?php require_once(root_path.'/include/top_section.php') ?>

	<title><?php echo $post['title']; ?></title>
</head>
<body>
	<div class="page_container">
		<?php require_once(root_path.'/include/navbar.php'); ?>

	<div class="post_page_text">
		<h3 class="post_title"><?php echo $post['title']; ?></h3>
		<h4><?php get_author($_GET['post-slug']); ?></h4>

		<img  src="<?php echo base_url . "/images/" . $post['image']; ?>">
		<div class="post_text"><?php echo $post['body']; ?></div>
	</div>

	<div class="comment_section" >
		<div class="likes">
		<?php
		echo "<form method='POST' action='".set_comment()."'>
			<input type ='hidden' name='uid' value='1'>
			<button type='submit' name='commentSubmit' class='likebtn'>Like</button>
		</form>";
		?>
		</div>
		<div class="post_comment">
		<?php
		echo "<form method='POST' action='".set_comment()."'>
			<input type ='hidden' name='uid' value='1'>
			<input type='hidden' name = 'time_stamp' value='".date('Y-m-d H:i:s')."'>
			<textarea name = 'comment' class= 'comment text_area' value='' placeholder='Leave a comment/suggestion here'></textarea>
			<button type='submit' name='commentSubmit' class='submitbtn'>Comment</button>
		</form>";
		?>
	</div>
	</div>
	<!-- display all comments -->
	<div class="comment_list">
		<?php foreach ($comments as $each_comment): ?>
		<div class="comment">
		<table>
			<tr>
			<b><?php echo $each_comment['uid'] . ' says </b>- <i>"' . $each_comment['comment'] . '"' ?></i>
		</tr>
		<tr>
		<div class="time_stamp">
				<?php echo $each_comment['created_at']; ?>
		<div>
		<tr>
		</table>
		</div>
		<?php endforeach; ?>
	</div>
	</div>

<?php require_once(root_path.'/include/footer.php'); ?>
