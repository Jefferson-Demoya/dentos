<div class="container">
	<div class="row">
		<form action="accion_crear_blog.php" method="post" class="col-md-9 go-right">
			<h2>Crear nuevo blog</h2>
			<div class="form-group">
				<label for="titulo">Título</label>
				<input id="titulo" name="titulo" type="text" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea id="descripcion" name="descripcion" type="tel" class="form-control" required></textarea>
			</div>
			<div class="form-group">
				<label for="categoria">Categoria</label>
				<textarea id="categoria" name="categoria" class="form-control" required></textarea>
			</div>
			<input type="datetime" name="fecha" hidden  value="<?php echo date("Y/m/d");?>"> 
			<input type="submit" name="Submit" class="btn btn-success" value="Crear accion">
		</form>
	</div>
</div>