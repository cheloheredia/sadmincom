<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/

/**
 * @var string
 */
$criterio = $_GET["term"];

/**
 * @var string
 */
$opt = $_GET['opt'];
include('ini.php');
if (!$criterio) return;
if (!$opt) return;
?>
[<?php
switch ($opt) {
    case 'protagonista':
        include('wsdlprotagonista.php');
        $cliente = new SoapClient($protagonistadir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMapprotagonista']));
        $respuesta = $cliente->autocomplete(array('protagonista' => $criterio));
        if ($respuesta->error == 'OK') {
            $items = $respuesta->protagonista;
        } else {
            $items[0] = $respuesta->error;
        }
        break;
    case 'medio':
        include('wsdlmedio.php');
        $cliente = new SoapClient($mediodir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMapmedio']));
        $respuesta = $cliente->autocomplete(array('medio' => $criterio, 'tmedio' => $_GET['tmedio']));
        if ($respuesta->error == 'OK') {
            $items = $respuesta->medio;
        } else {
            $items[0] = $respuesta->error;
        }
        break;
    case 'programa':
        include('wsdlprograma.php');
        $cliente = new SoapClient($programadir,
                                  array('trace' => 1,
                                        'cache_wsdl' => WSDL_CACHE_NONE,
                                        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                                        'classmap'=>$GLOBALS['classMapprograma']));
        $respuesta = $cliente->autocomplete(array('programa' => $criterio, 'medio' => $_GET['medio']));
        if ($respuesta->error == 'OK') {
            $items = $respuesta->programa;
        } else {
            $items[0] = $respuesta->error;
        }
        break;
    default:
        break;
}
$contador = 0;
foreach ($items as $id => $item) 
{
	if ($contador++ > 0) print ", ";
	print "{ \"label\" : \"$item\", \"value\" : { \"opt\" : \"$opt\" } }";
}
?>]

