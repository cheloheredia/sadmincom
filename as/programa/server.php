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
class programa {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase programa.
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
	* Esta funcion busca los programas que conicidan de un determinado medio.
	*
	* @param string $input->programa cadena que buscar en programa
	* @return string $autocompleteprogramasalidas->error OK si no ocurrio ningun error
	*		  cuidades $autocompleteprogramasalidas->programa que contiene los protagonistas que coincidan
	*/
	public function autocomplete($input) {
		$res = new autocompleteprogramasalidas();
		$input->programa = strtoupper($input->programa);
		$resdbs = $this->clientdbs->buscarmedio(array('medio'=> $input->medio));
		switch ($resdbs->error) {
			case 0:
				$idmedio = $resdbs->matriz[0]->columnas[0];
				$resdbs = $this->clientdbs->buscarprogramamedio(array('medio'=> $idmedio,
				                                                'programa' => $input->programa));
				switch ($resdbs->error) {
					case 0:
						$res->error = 'OK';
						for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
							$res->programa[$i] = $resdbs->matriz[$i]->columnas[1];
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
				$res->error = 'Medio incorrecto';
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
$server = new SoapServer($asdir."/wsdl/programa.wsdl");
$server->setClass("programa");
$server->handle();

