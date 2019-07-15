<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<center>
	<h3>Halaman Login Admin</h3>
	<form action="<?php echo base_url("index.php/login") ?>" method="post">
	<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
			<td></td>
				<td><input type="submit" value="Login"></td>
				
				
				<a class="link" href="crud">kembali</a>
			
</table>
</form>
</center>
</body>
</html>