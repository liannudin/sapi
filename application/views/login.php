<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="<?php echo base_url("index.php/login") ?>" method="post">
	<label>Username</label>
<input type="text" name="username">
<label>Password</label>
<input type="password" name="password">
<button type="submit">Login</button>
</form>
</body>
</html>