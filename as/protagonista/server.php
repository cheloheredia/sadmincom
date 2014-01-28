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
class protagonista {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase protagonista.
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
	* Esta funcion busca los protagonistas que conicidan.
	*
	* @param string $input->protagonista cadena que buscar en protagonista
	* @return string $autocompleteprotagonistasalidas->error OK si no ocurrio ningun error
	*		  cuidades $autocompleteprotagonistasalidas->protagonista que contiene los protagonistas que coincidan
	*/
	public function autocomplete($input) {
		$res = new autocompleteprotagonistasalidas();
		$input->protagonista = strtoupper($input->protagonista);
		$resdbs = $this->clientdbs->buscarprotagonista(array('protagonista'=> $input->protagonista));
		switch ($resdbs->error) {
			case 0:
				$res->error = 'OK';
				for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
					$res->protagonista[$i] = $resdbs->matriz[$i]->columnas[1];
				}
				break;
			case 1:
				$res->error = 'No existen coincidencias';
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
$server = new SoapServer($asdir."/wsdl/protagonista.wsdl");
$server->setClass("protagonista");
$server->handle();

