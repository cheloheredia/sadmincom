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
class horario {

	/**
	* Esta funcion inicia todos los clientes necesarios para el funcionamiento de la clase horario.
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
	* Esta funcion busca todos los horarios de un programa.
	*
	* @param string $input->programa programa del cual se quiere saber sus horarios
	* @return string $cargarcombohorariosalidas->error OK si no ocurrio ningun error
	*		  cuidades $cargarcombohorariosalidas->horario que contiene los horarios
	*/
	public function cargarcombo($input) {
		$res = new cargarcombohorariosalidas();
		$input->programa = strtoupper($input->programa);
		$resdbs = $this->clientdbs->buscarprograma(array('programa' => $input->programa));
		switch ($resdbs->error) {
			case 0:
				$idprograma = $resdbs->matriz[0]->columnas[0];
				$resdbs = $this->clientdbs->buscarhorarioprograma(array('programa' => $idprograma));
				switch ($resdbs->error) {
					case 0:
						$res->error = 'OK';
						for ($i = 0; $i < sizeof($resdbs->matriz); $i++) {
							$res->horario[$i] = $resdbs->matriz[$i]->columnas[1];
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
				$res->error = 'El programa es incorrecto';
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
$server = new SoapServer($asdir."/wsdl/horario.wsdl");
$server->setClass("horario");
$server->handle();

