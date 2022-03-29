<?php
require_once '../../controller/dbc.php';
$correo = $_SESSION['correo'];
?>

<div class="col-md-8 col-xl-9 " >
	<h1 align="center"><b>Tus blogs</b></h1><br>	
	<div align="right" >
	</div>
</div>
<br>

<?php foreach ($DB->query('SELECT * FROM blog  WHERE correo_creador LIKE "'.$correo.'" ') as $row){?> 
	<div class="row" >
		<div class="col-md-8 col-xl-9 carta-top"><br>
			<h3 align="center"><?php echo $row['titulo'] ?></h3>
			<div class="row">
				<div class="col-md-12">
					<div class="md-form">
						<textarea class="form-control" rows="4" cols="50" style="background-color: #f9f9f9; border-color: white;" disabled readonly><?php echo $row['descripcion'] ?></textarea>
						<h6><?php echo $row['fecha'] ?></h6>
					</div>
					<br>
				</div>
			</div><br>
		</div>
	</div>  <br>
	<?php
}
?>

