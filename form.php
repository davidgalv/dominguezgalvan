<html>
	<head>
		<title>Formulario para subir archivo</title>
                <meta charset="UTF-8"/>
	</head>
	<body>
		<h1>Subir imagen o Fichero</h1>
		<form enctype="multipart/form-data" method="post" action="upload.php">
                    <input name="image" required="" type="file" />
                    <br>
                    <input type="submit" value="Upload">
		</form>
	</body>

</html>
