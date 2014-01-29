<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'programa/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($asdir.'/wsdl/programa.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->autocomplete(array('medio'=>'ATB LA PAZ', 'programa'=>'a'));
print_r ($respuesta);

