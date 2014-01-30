<?php
include 'db/wsdl.php';
include 'ini/ini.php';
$cliente=new SoapClient($dbsdir.'/wsdl/db.wsdl',array( 'trace' => 1,'cache_wsdl' => WSDL_CACHE_NONE, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'classmap'=>$classMap));
$respuesta=$cliente->buscarciudaddepartamento(array('departamento'=>2, 'ciudad'=>'C'));
print_r($respuesta);
?>