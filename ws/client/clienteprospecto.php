<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/

/**
 * @var string
 */
$opt = $_POST['opt'];
include('ini.php');
switch ($opt) {
    case 'respros':
        include('wsdlprospecto.php');
        $cliente = new SoapClient($prospectodir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMapprospecto']));
        $respuesta = $cliente->registrarparaportadas(array( 
                                                           'nombre' => $_POST['nombre'],
                                                           'apellido' => $_POST['apellido'],
                                                           'email' => $_POST['email'],
                                                           'pais' => $_POST['pais'],
                                                           'ciudad' => $_POST['ciudad'],
                                                           'revista' => $_POST['revista']));
        if ($respuesta->error == 'OK') {
            die('Registro correcto');
        } else {
            die($respuesta->error);
        }
        break;
    default:
        break;
}

