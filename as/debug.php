<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'clasificacion/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($asdir.'/wsdl/clasificacion.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->cargarcombo();
print_r ($respuesta);

