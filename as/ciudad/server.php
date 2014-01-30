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
class ciudad {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase ciudad.
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
	* Esta funcion busca las ciudades que conicidan.
	*
	* @param string $input->ciudad cadena que buscar en ciudad
	* @param string $input->departamento departamento al que pertenecen la ciudad a buscar
	* @return string $autocompleteciudadsalidas->error OK si no ocurrio ningun error
	*		  cuidades $autocompleteciudadsalidas->ciudad que contiene los protagonistas que coincidan
	*/
	public function autocomplete($input) {
		$res = new autocompleteciudadsalidas();
		$input->ciudad = strtoupper($input->ciudad);
		$resdbs = $this->clientdbs->buscardepartamento(array('departamento' => $input->departamento));
		switch ($resdbs->error) {
			case 0:
				$departamentoid = $resdbs->matriz[0]->columnas[0];
				$resdbs = $this->clientdbs->buscarciudaddepartamento(array('departamento' => $departamentoid,
				                                                     'ciudad' => $input->ciudad));
				switch ($resdbs->error) {
					case 0:
						$res->error = 'OK';
						for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
							$res->ciudad[$i] = $resdbs->matriz[$i]->columnas[1];
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
				break;
			case 1:
				$res->error = 'No existe el departamento';
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
$server = new SoapServer($asdir."/wsdl/ciudad.wsdl");
$server->setClass("ciudad");
$server->handle();

