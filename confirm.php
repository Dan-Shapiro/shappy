<?php
	if($_GET) {
		$email = $_GET['email'];

		include 'config.php';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

		$query = sprintf("SELECT COUNT(id) FROM users WHERE email='%s' AND confirmed=0", mysqli_real_escape_string($conn, $email));

		$result = mysqli_query($conn, $query);
		list($count) = mysqli_fetch_row($result);
		if($count >= 1) {
			$query = sprintf("UPDATE users SET confirmed=1 WHERE email='%s'", mysqli_real_escape_string($conn, $email));

			mysqli_query($conn, $query);

			?>
			<span style='color:green;'>Congratulations, you've confirmed your email address!</span>
			<?php
		}
		else {
			?>
			<span style='color:red;'>Oops! Either this user does not exist, or this email address has already been confirmed.</span>
			<?php
		}
	}
?>

<p><a href="login.php">Login</a></p>
