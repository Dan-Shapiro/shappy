<?php
	if($_POST) {
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		if ($password != $confirm) {
			?>
			<span style='color:red;'>Error: Passwords do not match!</span>
			<?php
		}
		else {
			require_once 'config.php';
			$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
			mysql_select_db($dbname);

			$query = sprintf("	SELECT COUNT(id) FROM users WHERE UPPER(username)=UPPER('%s')", mysql_real_escape_string($_POST['username']));

			$result = mysql_query($query);
			list($count) = mysql_fetch_row($result);
			if($count >= 1) {
				?>
				<span style='color:red;'>Error: username is taken.</span>
				<?php
			}
			else {
				$email = $_POST['email'];

				$query = sprintf("	INSERT INTO users(username, password, email) VALUES ('%s', '%s', '%s');", mysql_real_escape_string($_POST['username']), mysql_real_escape_string(md5($password)), mysql_real_escape_string($email));
				mysql_query($query);





				$mailpath = 'C:/xampp/htdocs/Assignment2/src/PHPMailer';
				$path = get_include_path();
				set_include_path($path . PATH_SEPARATOR . $mailpath);
				require 'PHPMailerAutoload.php';
				
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "tls";
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587;
				$mail->IsHTML(true);
				$mail->Username = "test.shappy@gmail.com";
				$mail->Password = "testshappy";

				$sender = "Shappy";
				$subj = "Shappy Email Confirmation";
				$receiver = $email;
				$msg = "<p>Thank you for signing up to Shappy.  Click below to confirm your email address.</p><p><a href='http://localhost/Shappy/confirm.php?email=$email'>below</a></p>";
				
				$mail->addAddress($receiver);
				$mail->SetFrom($sender);
				$mail->Subject = "$subj";
				$mail->Body = "$msg";
				
				if(!$mail->send()) 
				{
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				}

				?>
				<span style='color:green;'>Registration successful!</span>
				<?php
			}
		}
	}
?>

<form method='post' action='register.php'>
	Username: <input type="text" name="username" /><br />
	Password: <input type="password" name="password" /><br />
	Confirm Password: <input type="password" name="confirm" /><br />
	Email: <input type="text" name="email" /><br />
	<input type="submit" name="Register" />
</form>
