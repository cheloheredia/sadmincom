<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'medio/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($asdir.'/wsdl/medio.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->mostrartmedios();
print_r ($respuesta);

