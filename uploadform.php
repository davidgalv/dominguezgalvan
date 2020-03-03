<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Subida de Imágenes</title>
	</head>	
	<body>		
		<form name="form" id="form" method="post" action="uploadcopia.php" enctype="multipart/form-data">
			<table>
				<tr>	
					<td>
						Escribe tu nombre: <input type="text" name="nombre">
					</td>
				</tr>
				<tr>
					<td>
						Subir foto: <input type="file" name="imagen">
					</td>
				</tr>
				<tr>
					<td>
						Añade una descripción: 
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="descripcion">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="Enviar" value="Enviar">
					</td>
				</tr>		
			</table>			
		</form>
	</body>
</html>