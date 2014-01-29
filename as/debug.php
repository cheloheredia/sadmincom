<?php
/*include('ini/ini.php');
echo $GLOBALS['dbsdir'];*/
include 'horario/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($asdir.'/wsdl/horario.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->cargarcombo(array('programa'=>'ATB NOTICIAS'));
print_r ($respuesta);

