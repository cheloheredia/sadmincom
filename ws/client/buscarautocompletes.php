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

