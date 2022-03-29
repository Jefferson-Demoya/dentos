<?php
session_start();
session_destroy();
// se elimina la sesion si esta abierta para cerrarla
header('location: ../index.php');
?>
