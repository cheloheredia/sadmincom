<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<script type="text/javascript" src="lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="lib/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/ini.js"></script>
<script type="text/javascript" src="js/subir.js"></script>
<div id='form'>
<label for="fecha">Fecha:</label>
<input type="text" name="fecha" id="fecha"><br>
<label for="titular">Titular:</label>
<input type="text" name="titular" id="titular"><br>
<label for="protagonista">Protagonista:</label>
<input type="text" name="protagonista" id="protagonista"><br>
<label for="resumen">Resumen:</label>
<textarea name="resumen" id="resumen"></textarea><br>
<label for="tmedio">Tipo Medio:</label>
<select name="tmedio" id="tmedio"></select><br>
<label for="medio">Medio:</label>
<input type="text" name="medio" id="medio"><br>
<label for="programa">Programa:</label>
<input name="programa" type="text" id="programa"><br>
<label for="horario">Horario:</label>
<select name="horario" id="horario"></select><br>
<label for="espacio">Espacio:</label>
<select name="espacio" id="espacio"></select><br>
<label for="departamento">Departamento:</label>
<select name="departamento" id="departamento"></select><br>
<label for="ciudad">Ciudad o Localidad:</label>
<input name="ciudad" type="text" id="ciudad"><br>
<label for="clasificacion">Clasificacion:</label>
<select name="clasificacion" id="clasificacion"></select><br>
<input type="hidden" name="opt" id="opt" value="respros">
<input name="enviar" id='enviar' type="button" value="Subir Archivo" /><br>
</div>
<div id="respuesta"></div>
</body>
</html>