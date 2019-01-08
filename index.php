<?php require_once('connect.php');  ?> <!-- establishing connection with the database -->
<?php require_once(root_path.'/include/function.php'); ?> <!-- adding file consisting of all functions -->
<?php $posts = fetch_published_posts(); ?>
<?php require_once(root_path.'/include/top_section.php') ?> <!-- adding the top portion of the file -->

	<title> My Blog </title>
</head>
<body>

	<div class="page_container">
		<?php require_once(root_path.'/include/navbar.php'); ?> <!-- including the navbar portion of the file -->
			<p>
				<!-- <div class="blog_list_title">Brook</div> -->
				<p class="blog_list_title_desc">
					"Letting thoughts flow"
				</p>
			</p>
			<div class="search_bar">
				<form name="search">
					<input type="text" name="search" value="" class="search" placeholder="Search blogs...">
				</form>
			</div>
			<div class="blog_list">
				<?php foreach ($posts as $blog_post): ?>
				<div class="blog_post">
					<a href="post_page.php?post-slug=<?php echo $blog_post['slug']; ?>">
						<table>
						<tr>
						<td><div class = "image_container"><img src="<?php echo base_url . '/images/' . $blog_post['image'] ?>" class="image" alt=""></div></td>
						<td>
						<div class="post_descrip">
							<h4>
								<?php echo $blog_post['title']; ?>
							</h4>
							<div class="content">
								<div class="date"><?php
								echo date("l jS \of F Y | h:i A",strtotime($blog_post["created_at"])) . "<br>"; ?></div>
								<div class="read_more">Read more...</div>
							</div>
						</div>
						</td>
						</tr>
						</table>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
	</div>
	<?php require_once(root_path . '/include/footer.php') ?>
