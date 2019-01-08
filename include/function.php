

<?php
// function to fetch posts(all) from the database and returning them to the HTML
	function fetch_published_posts()	{
		global $connection_pointer;
		$sql = "SELECT * FROM posts WHERE published=1";
		$result = mysqli_query($connection_pointer, $sql);
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $posts;
	}

	//fetch comments
	function fetch_comment($slug)	{
		global $connection_pointer;
		$post_slug =$_GET['post-slug'];
		$sql_comment = "SELECT * FROM commments WHERE post_slug = '$post_slug';";
		$result_comment = mysqli_query($connection_pointer, $sql_comment);
		$all_comments = mysqli_fetch_all($result_comment, MYSQLI_ASSOC);
		return $all_comments;
	}

	function get_single_post($slug){
		global $connection_pointer;
		$post_slug =$_GET['post-slug'];
		$sql = "select * from posts where slug = '" . $post_slug . "' and published = 1;";
		$result = mysqli_query($connection_pointer,$sql);
		$post = mysqli_fetch_assoc($result);
		return $post;
	}

	//getting the Author of the post
	function get_author($slug){
		global $connection_pointer;
		$post_slug = $_GET['post-slug'];
		$sql = "select * from posts where slug = '" . $post_slug . "' and published = 1;";
		$result = mysqli_query($connection_pointer,$sql);
		$author = mysqli_fetch_assoc($result);
		$author_id = $author['user_id'];

		$sql_userid = "select * from users where id = " . $author_id . ";";
		$result_author = mysqli_query($connection_pointer,$sql_userid);
		$author_id = mysqli_fetch_assoc($result_author);
		echo "- ".$author_id['username'] . "<br>" . date("l jS \of F Y  h:i A",strtotime($author_id["created_at"]));
	}

	//posting the comments
	function set_comment()  {
    if(isset($_POST['commentSubmit']))  {
			global $connection_pointer;
      $uid = $_POST['uid'];
      $time_stamp = $_POST['time_stamp'];
      $comment = $_POST['comment'];
		  $sql = "insert into commments (uid, comment, created_at) values ('$uid', '$comment', '$time_stamp');";
      $comment_make = mysqli_query($connection_pointer, $sql);
    }
  }
?>
