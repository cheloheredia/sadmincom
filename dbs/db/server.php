<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
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
	* servidor PostgreSQL.
	*
	* @return bool true si la conexion fue correcta
	*/
	public function conexion() {
		$this->conexion = pg_connect('host=127.0.0.1 port=5432 dbname=sadmincom user=sadmincom password=sa2dm0in1co4m');
	}
	
	/**
	* Esta funcion sierra la conexxion con el servidor PostgreSQL.
	*
	* @return bool true si la desconexion fue correcta
	*/
	public function desconexion() {
		pg_close($this->conexion);
	}
	
	/**
	* Esta funcion ejecuta cualquier consulta sql.
	*
	* @param string $query consulta sql
	* @return sqlresponse contiene la respuesta de la ejecuion de la consulta
	*/
	public function ejecutarquery($query) {
		return(pg_query($query));
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
		if (pg_num_rows($sql) > 0) {
			for ($j = 0; $j < pg_num_rows($sql); $j++) {
				$row = pg_fetch_row($sql);
				for ($i = 0; $i < pg_num_fields($sql); $i++) {
					$sqlmatriz->matriz[$j]->columnas[$i] = $row[$i];
				}
			}
			$sqlmatriz->error = 0;
			return $sqlmatriz;
		} else {
			$sqlmatriz->error = 1;
			return $sqlmatriz;
		}
		if (pg_num_rows($sql) == -1) {
			$sqlmatriz->error = -1;
			return $sqlmatriz;
		}
	}
	
	/**
	* Esta funcion busca protagonista definido en la tabla portagonista.
	*
	* @param string $input->protagonista el protagonista que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarprotagonista($input) {
		$this->conexion();
		$response = $this->mostrar("select a.pn, a.pprotagonista from protagonista a where a.pprotagonista like '".
		                           $input->protagonista."%' limit 10");
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
	/*public function registrarprospecto($input) {
		$this->conexion();
		$response = new res();
		if ($this->ejecutarquery("insert into prospecto values('','".$input->nombre."','".$input->apellido."','".
		    $input->email."',".$input->cuidad.", '".$input->fecha."')"INSERT INTO protagonista(pprotagonista)VALUES ('TUTO QUIROGA');)) {
			$response->res = 0;
		} else {
			$response->res = 1;
		}
		$this->desconexion();
		return $response;
	}*/

}
$server = new SoapServer($dbsdir."/wsdl/db.wsdl");
$server->setClass("db");
$server->handle();

