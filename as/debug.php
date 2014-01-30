<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'ciudad/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($asdir.'/wsdl/ciudad.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->autocomplete(array('ciudad'=>'c','departamento'=>'ORURO'));
print_r ($respuesta);

