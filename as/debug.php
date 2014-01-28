<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'protagonista/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($asdir.'/wsdl/protagonista.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->autocomplete(array('protagonista'=>'to'));
print_r ($respuesta);

