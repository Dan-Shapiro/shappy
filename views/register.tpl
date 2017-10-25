<html>
<head>
	<title>Register</title>
</head>
<body>
	{if $error ne ""}
		<span style='color:red;'>Error: {$error}</span>
	{/if}

	{if $message ne ""}
		<span style='color:green;'>{$message}</span>
	{/if}

	<form method='post' action='register.php'>
		Username: <input type="text" name="username" id="username" /><br />
		Password: <input type="password" name="password" /><br />
		Confirm Password: <input type="password" name="confirm" /><br />
		Email: <input type="text" name="email" /><br />
		<input type="submit" name="Register" />
	</form>
	<script type="text/javascript">
		document.getElementById('username').focus();
	</script>
</body>
</html>