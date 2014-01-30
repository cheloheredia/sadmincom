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
class espacio {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase espacio.
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
	* @return string $cargarcomboespaciosalidas->error OK si no ocurrio ningun error
	*		  cuidades $cargarcomboespaciosalidas->espacio que contiene los espacios
	*/
	public function cargarcombo($input) {
		$res = new cargarcomboespaciosalidas();
		$resdbs = $this->clientdbs->buscarespaciotodo();
		switch ($resdbs->error) {
			case 0:
				$res->error = 'OK';
				for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
					$res->espacio[$i] = $resdbs->matriz[$i]->columnas[1];
				}
				break;
			case 1:
				$res->error = 'No existen espacios';
				break;
			case -1:
				$res->error = 'Error favor volver a intentar';
				break;
			default:
				$res->error = 'Error inesperado';
				break;
		}		
		return $res;
	}
}
$server = new SoapServer($asdir."/wsdl/espacio.wsdl");
$server->setClass("espacio");
$server->handle();

