<?php
include 'db/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($dbsdir.'/wsdl/db.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->buscarprogramamedio(array('medio'=>1, 'programa'=>'A'));
print_r($respuesta);
?>