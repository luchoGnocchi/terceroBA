<?php
	session_start();
	unset($_SESSION['Usuarios']);
	session_destroy();
	header("Location: ../index.php");
?>