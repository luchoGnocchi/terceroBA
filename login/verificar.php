<?php

	session_start();
	include "../php/conexion.php";
	$Usuario=$_POST['Usuario'];
	$pass=$_POST['password'];
	
	$re="select * from usuarios u where u.Usuario='".$Usuario."' AND password='".$pass."'" ;
	//echo '<script>alert (" Ha respondido '.$f['id_local'].' respuestas afirmativas");</script>';
		
	if(!$resultado = $conexion->query($re)){
    echo '<meta http-equiv="Refresh" content="0;url= ../cambiarPassword.php">	';
	die('No existe el usuario');
	}
	$ci="0";
	while ($f=$resultado->fetch_assoc()){
            		//echo '<script>alert (" Ha respondido '.$f['id_local'].' respuestas afirmativas");</script>';
		
		$arreglo=array('IdUsuario'=>$f['IdUsuario'],
			'Usuario'=>$f['Usuario'],
                    'Nombre'=>$f['Nombre'],
                    'Apellido'=>$f['Apellido'],	
                  
					'ci'=>$f['Ci'],
                    'password'=>$f['Password']);
		
			}
	if(isset($arreglo)){
		$_SESSION['Usuarios']=$arreglo;
		if ($arreglo['ci']==$arreglo['password']){
		
?>			
			<meta http-equiv="Refresh" content="0;url= ../cambiarPassword.php">
<?php 
		}else{


?>
<html>
<head>
<meta http-equiv="Refresh" content="0;url= ../admin/pages/inasistenciadocente.php">
</head>
</html>
<?php

	}}else{
		
		$re="select * from usuarios where Usuario='".$Usuario."' AND password='".$pass."'";
		if(!$resultado = $conexion->query($re)){
	    	die('No existe el usuario');
		}
		while ($f=$resultado->fetch_assoc()){
			$arreglo=array('Usuario'=>$f['Usuario'], 'imagen' => $f['imagen'], 'nombre' => $f['nombre'], 'tabla' => $f);
		}
		if(isset($arreglo)){
			$_SESSION['Usuario']=$arreglo;
	?>
	<html>
	<head>
	<meta http-equiv="Refresh" content="0;url= ../index.php">
	</head>
	</html>
		<?php
	}else{
		?>	
<html>
<head>
<meta http-equiv="Refresh" content="0;url= ../index.php?error=datos no validos">
</head>
</html>
<?php

		//header("Location: ../login.php?error=datos no validos");
	}}

?>
