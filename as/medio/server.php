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
class medio {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase medio.
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
	* Esta funcion busca todos los tipos de medios.
	*
	* @return string $mostrartmediossalidas->error OK si no ocurrio ningun error
	*		  cuidades $mostrartmediossalidas->tipo que contiene los tipos
	*/
	public function mostrartmedios($input) {
		$res = new mostrartmediossalidas();
		$resdbs = $this->clientdbs->buscartmediotodo();
		switch ($resdbs->error) {
			case 0:
				$res->error = 'OK';
				for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
					$res->tipo[$i] = $resdbs->matriz[$i]->columnas[1];
				}
				break;
			case 1:
				$res->error = 'No existen tipos de medios';
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

	/**
	* Esta funcion busca coincidencias de medios segun un tipo.
	*
	* @param string $input->tmedio el tipo de medio al que pertenece el medio a buscar
	* @param string $input->medio medio para buscar coincidencias
	* @return string $mostrartmediossalidas->error OK si no ocurrio ningun error
	*		  cuidades $mostrartmediossalidas->tipo que contiene los tipos
	*/
	public function autocomplete($input) {
		$res = new autocompletemediosalidas();
		$resdbs = $this->clientdbs->buscartmedio(array('tmedio' => $input->tmedio));
		switch ($resdbs->error) {
			case 0:
				$tmedioid = $resdbs->matriz[0]->columnas[0];
				$input->medio = strtoupper($input->medio);
				$resdbs = $this->clientdbs->buscarmediotmedio(array('tmedio' => $tmedioid, 'medio' => $input->medio));
				switch ($resdbs->error) {
					case 0:
						$res->error = 'OK';
						for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
							$res->medio[$i] = $resdbs->matriz[$i]->columnas[1];
						}
						break;
					case 1:
						$res->error = 'No hay coincidencias';
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
				$res->error = 'No existe el tipo de medio';
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
$server = new SoapServer($asdir."/wsdl/medio.wsdl");
$server->setClass("medio");
$server->handle();

