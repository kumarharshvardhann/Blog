<?php require_once('./connect.php');  ?>
<!-- establishing connection with the database -->
<?php require_once(root_path.'/include/function.php'); ?> <!-- adding file consisting of all functions -->
<?php

	$username = "";
	$email    = "";
	$errors = array();

	if (isset($_POST['reg_user'])) {
		$username = esc($_POST['username']);
		$email = esc($_POST['email']);
		$password_1 = esc($_POST['password_1']);
		$password_2 = esc($_POST['password_2']);

    //registration form validation
		if (empty($username)) {  array_push($errors, "Username missing!"); }
		if (empty($email)) { array_push($errors, "Email missing"); }
		if (empty($password_1)) { array_push($errors, "Create a Password!"); }
		if ($password_1 != $password_2) { array_push($errors, "Passwords do not match! Re-enter");}

		//if already registered
		$user_check = "SELECT * FROM users WHERE username='$username'
								OR email='$email' LIMIT 1";

		$result = mysqli_query($connection_pointer, $user_check);
		$user = mysqli_fetch_assoc($result);
		if ($user) {
			if ($user['username'] === $username) {
			  array_push($errors, "Username is already registered!");
			}
			if ($user['email'] === $email) {
			  array_push($errors, "Email is already registered!");
			}
		}

		// new registration
		if (count($errors) == 0) {
      //encryption using md5 message digest algo
			$password = md5($password_1);
			$user_create_query = "INSERT INTO users (username, email, password, created_at, updated_at)
					  VALUES('$username', '$email', '$password', now(), now())";
			mysqli_query($connection_pointer, $user_create_query);
      // retrieving the user id (auto_increment'ed)
			$reg_user_id = mysqli_insert_id($connection_pointer);
			// logged in user enter session
			$_SESSION['user'] = getUserById($reg_user_id);
			// user is admin? admin_view : user_view ;
			if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
				$_SESSION['message'] = "You are now logged in";
				// redirect to admin area
				header('location: ' . base_url . 'admin/admin_view.php');
				exit(0);
			} else {
				$_SESSION['message'] = "You are now logged in";
				// redirect to public area
				header('location: index.php');
				exit(0);
			}
		}
	}

	// LOG USER IN
	if (isset($_POST['login_btn'])) {
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);

		if (empty($username)) { array_push($errors, "Username required"); }
		if (empty($password)) { array_push($errors, "Password required"); }
		if (empty($errors)) {
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

			$result = mysqli_query($connection_pointer, $sql);
			if (mysqli_num_rows($result) > 0) {
				// get id of created user
				$reg_user_id = mysqli_fetch_assoc($result)['id'];

				// put logged in user into session array
				$_SESSION['user'] = getUserById($reg_user_id);

				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
					$_SESSION['message'] = "Admin logged in!";
					// redirect to admin area
					header('location: ' . base_url . '/admin/admin_view.php');
					exit(0);
				} else {
					$_SESSION['message'] = "User logged in!";
					// redirect to public area
					header('location: index.php');
					exit(0);
				}
			} else {
				array_push($errors, 'Credentials do not match!');
			}
		}
	}

	// exrtact value from form
	function esc(String $value)
	{
		global $connection_pointer;

		$val = trim($value);
    //escaping any special characters from the string
		$val = mysqli_real_escape_string($connection_pointer, $value);

		return $val;
	}

	// Get user info from user id
	function getUserById($id)
	{
		global $connection_pointer;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($connection_pointer, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}
?>
