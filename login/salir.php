<?php
	session_start();
	unset($_SESSION['Usuarios']);
	
	header("Location: ../index.php");
?>