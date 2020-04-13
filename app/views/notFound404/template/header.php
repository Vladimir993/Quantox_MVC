<!DOCTYPE html>
<html>
<head>
	<title><?= ucfirst($view) ?></title>
	<link rel="stylesheet" type="text/css" href="../../public/css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav class="navtop">
		<div>
			<?php if (!isset($_SESSION['user'])): ?>
				<a href="http://localhost/Quantox_MVC/public/Home/index"><i class="fas fa-sign-in-alt"></i>Home</a>
				<a href="http://localhost/Quantox_MVC/public/Login/index"><i class="fas fa-sign-in-alt"></i>Login</a>
				<a href="http://localhost/Quantox_MVC/public/Register/index"><i class="fas fa-registered"></i>Register</a>
			<?php endif ?>

		</div>
	</nav>
	










