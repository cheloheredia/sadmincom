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
<label for="textfield">Pais:</label>
<input type="text" name="pais" id="pais"><br>
<label for="textfield">Ciudad:</label>
<input name="ciudad" type="text" disabled="disabled" id="ciudad"><br>
<label for="textfield">Revista:</label>
<input type="text" name="revista" id="revista">
<input type="hidden" name="opt" id="opt" value="respros">
<input name="enviar" id='enviar' type="button" value="Subir Archivo" /><br>
</div>
<div id="respuesta"></div>
</body>
</html>