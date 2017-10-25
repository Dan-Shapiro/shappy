<?php
	include 'smarty.php';

	$error = "";
	$message = "";

	if($_POST) {
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		if ($password != $confirm) {
			$error = 'Passwords do not match!';
		}
		else {
			include 'config.php';
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

			$query = sprintf("	SELECT COUNT(id) FROM users WHERE UPPER(username)=UPPER('%s')", mysqli_real_escape_string($conn, $_POST['username']));

			$result = mysqli_query($conn, $query);
			list($count) = mysqli_fetch_row($result);
			if($count >= 1) {
				$error = 'Username is taken.';
			}
			else {
				$email = $_POST['email'];

				$query = sprintf("	INSERT INTO users(username, password, email) VALUES ('%s', '%s', '%s');", mysqli_real_escape_string($conn, $_POST['username']), mysqli_real_escape_string($conn, md5($password)), mysqli_real_escape_string($conn, $email));
				mysqli_query($conn, $query);
				$message = 'Registered successfully!';
				/*
				$mailpath = 'C:/xampp/htdocs/Assignment2/src/PHPMailer';
				$path = get_include_path();
				set_include_path($path . PATH_SEPARATOR . $mailpath);
				*/
				require 'PHPMailer/PHPMailerAutoload.php';
				
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPDebug = 1;
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
				$msg = "<p>Thank you for signing up to Shappy.  Click below to confirm your email address.</p><p><a href='https://shappy.herokuapp.com/confirm.php?email=$email'>below</a></p>";
				
				$mail->addAddress($receiver);
				$mail->SetFrom($sender, "Shappy");
				$mail->Subject = "$subj";
				$mail->Body = "$msg";
				
				if(!$mail->send()) 
				{
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				}

				$user_id = mysqli_insert_id($conn);
				include 'stats.php';
				set_stat('atk', $user_id, '5');
				set_stat('def', $user_id, '5');
				set_stat('mag', $user_id, '5');

				$message = "Registered successfully!";

				header('Location:login.php');
			}
		}
	}

	$smarty->assign('error', $error);
	$smarty->assign('message', $message);

	$smarty->display('register.tpl');
?>
