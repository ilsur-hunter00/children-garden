<?php

	session_start();
	require_once 'connect.php';


	$login = $_POST['login'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];

	if ($password === $password_confirm) {
		$password=md5($password);
		$sql = "INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password')";
		mysqli_query($connect, $sql);
		$_SESSION['mess'] = 'Регистрация прошла успешно';
		header('Location: ../../index.php?signup=success');
	} else {
		$_SESSION['message'] = 'Пароли не совпадают';
		header('Location: ../../index.php #darkness');
	}

?>