<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
require_once('wsdl.php');
require_once('../ini/ini.php');
class db {

	/**
	 * @var sql conection
	 */
	public $conexion;
	
	/**
	* Esta funcion realiza la apertura de la instancia de conexion con el
	* servidor MySql.
	*
	* @return bool true si la conexion fue correcta
	*/
	public function conexion() {
		$this->conexion = mysql_connect('127.0.0.1:3306', 'nssystem', 'ns2sy0st1em3');
		mysql_select_db('newsucrip', $this->conexion);
	}
	
	/**
	* Esta funcion sierra la conexxion con el servidor MySql.
	*
	* @return bool true si la desconexion fue correcta
	*/
	public function desconexion() {
		mysql_close($this->conexion);
	}
	
	/**
	* Esta funcion ejecuta cualquier consulta sql.
	*
	* @param string $query consulta sql
	* @return sqlresponse contiene la respuesta de la ejecuion de la consulta
	*/
	public function ejecutarquery($query) {
		mysql_real_escape_string($query);
		return(mysql_query($query));
	}
	
	/**
	* Esta funcion convierte un sqlresponse en una estructura de matriz.
	*
	* @param string $query consulta sql
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function mostrar($query) {
		$sqlmatriz = new resquery();
		$sql = $this->ejecutarquery($query);
		if (mysql_num_rows($sql) > 0) {
			for ($j = 0; $j < mysql_num_rows($sql); $j++) {
				$row = mysql_fetch_row($sql);
				for ($i = 0; $i < mysql_num_fields($sql); $i++) {
					$sqlmatriz->matriz[$j]->columnas[$i] = $row[$i];
				}
			}
			$sqlmatriz->error = 0;
			return $sqlmatriz;
		} else {
			$sqlmatriz->error = 1;
			return $sqlmatriz;
		}
	}
	
	/**
	* Esta funcion busca revistas definidas en la tabla revista.
	*
	* @param string $input->revista la revista que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarrevista($input) {
		$this->conexion();
		$response = $this->mostrar("select a.rn, a. rrevista from revista a where a.rrevista like '".
		                           $input->revista."%' limit 10");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca un pais definido en la tabla pais.
	*
	* @param string $input->pais el pais que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarpais($input) {
		$this->conexion();
		$response = $this->mostrar("select a.pan, a.papais from pais a where a.papais like '".$input->pais.
		                           "%' limit 10");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca una ciudad definida en la tabla cuidad.
	*
	* @param string $input->cuidad la cuidad que se desea buscar
	* @param int $input->pais el pais del cual es la cuidad que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarcuidad($input) {
		$this->conexion();
		$response = $this->mostrar("select a.cn, a.ccuidad, a.cpais from cuidad a where a.ccuidad like '".
		                           $input->cuidad."%' and a.cpais = ".$input->pais." limit 10");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca un prospecto definido en la tabla prospecto.
	*
	* @param string $input->nombre el nombre del prospecto que se desea buscar
	* @param string $input->apellido el apellido del prospecto que se desea buscar
	* @param int $input->cuidad la ciudad del prospecto que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarprospecto($input) {
		$this->conexion();
		$response = $this->mostrar("select a.pn, a.pnombre, a.papellido, a.pemail, a.pciudad from prospecto a ".
		                           "where a.pnombre = '".$input->nombre."' and a.papellido = '".$input->apellido.
		                           "' and a.pciudad = ".$input->cuidad);
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion inserta un prospecto en la tabla prospecto.
	*
	* @param string $input->nombre el nombre del prospecto que se desea insertar
	* @param string $input->apellido el apellido del prospecto que se desea insertar
	* @param string $input->email el email del prospecto que se desea insertar
	* @param int $input->cuidad la ciudad del prospecto que se desea insertar
	* @param datetime $input->fecha fecha de suscripcion al sistema del prospecto que se desea insertar
	* @return int res->res que es 0 cuando no existe un error
	*
	*/
	public function registrarprospecto($input) {
		$this->conexion();
		$response = new res();
		if ($this->ejecutarquery("insert into prospecto values('','".$input->nombre."','".$input->apellido."','".
		    $input->email."',".$input->cuidad.", '".$input->fecha."')")) {
			$response->res = 0;
		} else {
			$response->res = 1;
		}
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion actualiza un prospecto en la tabla prospecto.
	*
	* @param string $input->prospecto el prospecto que se desea actualizar
	* @param string $input->nombre el nombre del prospecto que se desea actualizar
	* @param string $input->apellido el apellido del prospecto que se desea actualizar
	* @param string $input->email el email del prospecto que se desea actualizar
	* @param int $input->cuidad la ciudad del prospecto que se desea actualizar
	* @return int res->res que es 0 cuando no existe un error
	*
	*/
	public function actualizarprospecto($input) {
		$this->conexion();
		$response = new res();
		if ($this->ejecutarquery("update prospecto set pnombre = '".$input->nombre."', papellido = '".$input->apellido.
		    "', pemail = '".$input->email."', pciudad = ".$input->cuidad." where pn = ".$input->prospecto)) {
			$response->res = 0;
		} else {
			$response->res = 1;
		}
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca un tipo de suscripcion definido en la tabla tsuscripcion.
	*
	* @param string $input->tipo tipo de suscripcion que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscartsuscripcion($input) {
		$this->conexion();
		$response = $this->mostrar("select a.tsn, a.tstipo from tsuscripcion a where a.tstipo = '".$input->tipo."'");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca una suscripcion definida en la tabla suscripcion.
	*
	* @param int $input->revista revista de la suscripcion que se desea buscar
	* @param int $input->prospecto prospecto de la suscripcion que se desea buscar
	* @param int $input->tipo tipo de la suscripcion que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarsuscripcion($input) {
		$this->conexion();
		$response = $this->mostrar("select a.sn, a.srevista, a.sprospecto, a.stipo from suscripcion a where ".
		                           "a.srevista = ".$input->revista." and a.sprospecto = "
		                           .$input->prospecto." and a.stipo = ".$input->tipo);
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion inserta una suscripcion en la tabla suscripcion.
	*
	* @param int $input->prospecto prospecto de la suscripcion que se desea insertar
	* @param int $input->revista revista de la suscripcion que se desea insertar
	* @param int $input->tipo tipo de la suscripcion que se desea insertar
	* @param int $input->fecha fecha de suscripocion que se desea insertar
	* @return int res->res que es 0 cuando no existe un error
	*
	*/
	public function insertarsuscripcion($input) {
		$this->conexion();
		$response = new res();
		if ($this->ejecutarquery("insert into suscripcion values('',".$input->revista.",".$input->prospecto.",".
		    $input->tipo.", '".$input->fecha."')")) {
			$response->res = 0;
		} else {
			$response->res = 1;
		}
		$this->desconexion();
		return $response;
	}
}
$server = new SoapServer($dbsdir."/wsdl/db.wsdl");
$server->setClass("db");
$server->handle();

