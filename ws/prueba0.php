<?php
$tamano = $_FILES["archivo"]['size'];
$tipo = $_FILES["archivo"]['type'];
$archivo = $_FILES["archivo"]['name'];
//print_r($_FILES['archivo']);
//move_uploaded_file($_FILES['archivo']['tmp_name'],'docstemp/'.$archivo);
$contenido = base64_encode(file_get_contents($_FILES['archivo']['tmp_name']));
$handle = fopen("/".$archivo, "x+");
fwrite($handle, base64_decode($contenido));
fclose($handle);
print_r(base64_decode(base64_encode(file_get_contents($_FILES['archivo']['tmp_name']))));

