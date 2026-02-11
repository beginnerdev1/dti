<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Admin Login</title>
</head>
<body>
	<h1>Admin Login</h1>
	<form method="post" action="<?= site_url('admin/authenticate') ?>">
		<div>
			<label>Username
				<input type="text" name="username" required>
			</label>
		</div>
		<div>
			<label>Password
				<input type="password" name="password" required>
			</label>
		</div>
		<div>
			<button type="submit">Login</button>
		</div>
	</form>
</body>
</html>
