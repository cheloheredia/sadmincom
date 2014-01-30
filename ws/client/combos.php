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
        if ($respuesta->error == 'OK') {
            $opciones = $respuesta->tipo;
        } else {
            $opciones = $respuesta->error;
        }
        break;
    case 'horario':
        include('wsdlhorario.php');
        $cliente = new SoapClient($horariodir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMaphorario']));
        $respuesta = $cliente->cargarcombo(array('programa' => $_GET['programa']));
        if ($respuesta->error == 'OK') {
            $opciones = $respuesta->horario;
        } else {
            $opciones = $respuesta->error;
        }
        break;
    case 'espacio':
        include('wsdlespacio.php');
        $cliente = new SoapClient($espaciodir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMapespacio']));
        $respuesta = $cliente->cargarcombo();
        if ($respuesta->error == 'OK') {
            $opciones = $respuesta->espacio;
        } else {
            $opciones = $respuesta->error;
        }
        break;
    default:
        $respuesta->error = 'Error de combo';
        break;
}
print_r(json_encode($opciones));

