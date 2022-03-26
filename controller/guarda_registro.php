<?php  
require 'dbc.php';
$password = $_POST['password'];
$correo_ver = $_POST['correo'];

$registro=$DB->prepare("select * from usuarios where correo=:correo");
$registro->execute(array(':correo'=>$correo_ver));
$reg=$registro->fetch();
if($reg != false){
	echo "<script>
	alert('El correo electrónico ingresado ya se encuentra registrado, por favor ingrese otro.');
	window.location.href='registro.php';
	</script>";
}

else {

//cifrado
	$pass_cifrada = password_hash($password, PASSWORD_DEFAULT, array("cost"=>15));

	if ($DB == true) {

		$insert = $DB->prepare("INSERT INTO usuarios 
			(nombre, apellidos, correo, cargo, password, indicador, celular, 
			c_liderazgo, c_planeacion_estrategica, c_design_thinking, c_high_performance, c_gestion_del_tiempo, c_big_data, c_emotional_intelligence, c_collaborative_collaborative, c_inteligencia_emocional, c_trabajo_en_equipo, c_manejo_de_el_estres) 
			VALUES 
			(:nombre, :apellidos, :correo, :cargo, :password, :indicador, :celular, 
			'No comprado', 'No comprado', 'No comprado', 'No comprado','No comprado','No comprado' ,'No comprado' ,'No comprado' ,'No comprado', 'No comprado', 'No comprado')");

//insertar campos
		$insert->bindParam(':nombre', $_POST['nombre']);
		$insert->bindParam(':apellidos', $_POST['apellidos']);
		$insert->bindParam(':correo', $_POST['correo']);
		$insert->bindParam(':cargo', $_POST['cargo']);
		$insert->bindParam(':password', $pass_cifrada);
		$insert->bindParam(':indicador', $_POST['indicador']);
		$insert->bindParam(':celular', $_POST['celular']);


		$insert->execute();
//cierre conex
		$DB = null;

//redirex
		echo "<script>
		alert('Usted se ha registrado correctamente en la sección de cursos, por favor inicie sesión para continuar.');
		window.location.href='login.php';
		</script>";
	//header('Location: registro.php');
	} else {
		echo "Error al procesar recurso";
	}

}



?>