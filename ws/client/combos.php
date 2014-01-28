<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/

/**
 * @var string
 */
$combo = $_GET['combo'];
include('ini.php');
switch ($combo) {
    case 'tmedio':
        include('wsdlmedio.php');
        $cliente = new SoapClient($mediodir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMapmedio']));
        $respuesta = $cliente->mostrartmedios();
        break;
    default:
        $respuesta->error = 'Error de combo';
        break;
}
if ($respuesta->error == 'OK') {
    $opciones = $respuesta->tipo;
} else {
    $opciones = $respuesta->error;
}
print_r(json_encode($opciones));

