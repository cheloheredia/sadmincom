<?php
include('ini.php');
$archivo = $_FILES["archivo"]['name'];
if ($archivo != "") {
    $contenido = base64_encode(file_get_contents($_FILES['archivo']['tmp_name']));
    include('wsdlarchivo.php');
    $cliente = new SoapClient($archivodir,
                              array(
                                    'trace' => 1,
                                    'cache_wsdl' => WSDL_CACHE_NONE,
                                    'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                    'classmap'=>$GLOBALS['classMaparchivo']));
    $respuesta = $cliente->subir(array('archivo'=> $contenido, 'nombrearchivo' => $archivo));
    if ($respuesta->error == 'OK') {
        $status = 'Archivo subido correctamente';
    } else {
        $status = $respuesta->error;
    }
} else {
    $status = "Error al subir archivo";
}
echo $status;

