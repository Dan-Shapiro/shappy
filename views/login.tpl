<html>
<head>
	<title>Login</title>
</head>
<body>
	{if $error ne ""}
		<span style='color:red'>Error: {$error}</span>
	{/if}

	<form action='login.php' method='post'>
	Username: <input type="text" name="username" id="username" /><br />
	Password: <input type="password" name="password" /><br />
	<input type="submit" name="Login" />
	</form>

	<script type='text/javascript'>
		document.getElementById('username').focus();
	</script>
</body>
</html>
