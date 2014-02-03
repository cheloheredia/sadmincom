<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
*/
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
require_once('wsdl.php');
require_once('../client/wsdldb.php');
require_once('../ini/ini.php');
class archivo {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase archivo.
	*/
	public function __construct(){
		$this->clientdbs = new SoapClient($GLOBALS['dbsdir'].'/wsdl/db.wsdl',
		                                 array('trace' => 1,
		                                       'cache_wsdl' => WSDL_CACHE_NONE,
		                                       'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
		                                       'classmap' => $GLOBALS['classMapdb']));
		//include_once '../client/excelPHP.php';
		//include_once '../client/mPDF.php';
		//include_once '../client/PHPMailer.php';
	}

	/**
	* Esta funcion busca todos los espacio.
	*
	* @param string $inputo->archivo contenido del arhivo a subir
	* @param string $inputo->nombrearchivo nombre del arhivo a subir
	* @return string $subirarchivosalidas->error OK si no ocurrio ningun error
	*		  cuidades $subirarchivosalidas->clasificacion que contiene los espacios
	*/
	public function subir($input) {
		$res = new subirarchivosalidas();
		$handle = fopen("../archivos/".$input->nombrearchivo, "x+");
		if (fwrite($handle, base64_decode($input->archivo))) {
			fclose($handle);
			$res->error = 'OK';
		} else {
			$res->error = 'El archivo no se subio correctamente';
			unlink("archivos/".$input->nombrearchivo);
		}
		return $res;
	}
}
$server = new SoapServer($asdir."/wsdl/archivo.wsdl");
$server->setClass("archivo");
$server->handle();

