<?php  
session_start();
require '../../controller/dbc.php';
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
if ($DB == true) {
  
$insert = $DB->prepare("INSERT INTO blog
                (titulo, descripcion, categoria, fecha, creado_por, correo_creador) 
        VALUES (:titulo, :descripcion, :categoria, :fecha, :creado_por, :correo_creador)");

//insertar campos
$insert->bindParam(':titulo', $_POST['titulo']);
$insert->bindParam(':descripcion', $_POST['titulo']);
$insert->bindParam(':categoria', $_POST['categoria']);
$insert->bindParam(':fecha', $_POST['fecha']);
$insert->bindParam(':creado_por', $nombre);
$insert->bindParam(':correo_creador', $correo);


$insert->execute();
//cierre conex
$DB = null;

//redirex


echo "<script>
window.location = document.referrer;
</script>";
} else {
echo "Error al procesar recurso";
}

// ///


?>
