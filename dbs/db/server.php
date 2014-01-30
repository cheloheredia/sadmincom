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
		if ($sql = $this->ejecutarquery($query)) {
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
		} else {
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
	* Esta funcion busca todos los tipos de medios definidos en la tabla tmedio.
	*
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscartmediotodo($input) {
		$this->conexion();
		$response = $this->mostrar("select a.tmn, a.tmtipo from tmedio a");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca tipo de medio definido en la tabla tmedio.
	*
	* @param string $input->tmedio el protagonista que se desea buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscartmedio($input) {
		$this->conexion();
		$response = $this->mostrar("select a.tmn, a.tmtipo from tmedio a where a.tmtipo = '".$input->tmedio."'");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca medio definido en la tabla medio segun un tipo de medio.
	*
	* @param int $input->tmedio el tipo de medio al que pertenece el medio a buscar
	* @param string $input->medio el medio a buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarmediotmedio($input) {
		$this->conexion();
		$response = $this->mostrar("select a.mn, a.mmedio, a.mtipo, a.mciudad from medio a where a.mtipo = ".
		                           $input->tmedio." and a.mmedio like '".$input->medio."%' limit 10");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca medio definido en la tabla medio.
	*
	* @param string $input->medio el medio a buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarmedio($input) {
		$this->conexion();
		$response = $this->mostrar("select a.mn, a.mmedio, a.mtipo, a.mciudad from medio a where a.mmedio = '".
		                           $input->medio."'");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca programa definido en la tabla programa segun un medio.
	*
	* @param int $input->medio el medio al que pertenece el programa a buscar
	* @param string $input->programa el medio a buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarprogramamedio($input) {
		$this->conexion();
		$response = $this->mostrar("select a.pron, a.proprograma from programa a, programamedio b where".
		                           " b.pmprograma = a.pron and b.pmmedio = ".$input->medio." and a.proprograma like '".
		                           $input->programa."%' limit 10");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca programa definido en la tabla programa.
	*
	* @param string $input->programa el programa a buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarprograma($input) {
		$this->conexion();
		$response = $this->mostrar("select a.pron, a.proprograma from programa a where a.proprograma = '".
		                           $input->programa."'");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca horarios de un programa definidos en la tabla horario.
	*
	* @param int $input->programa el programa del cual buscar sus horarios
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarhorarioprograma($input) {
		$this->conexion();
		$response = $this->mostrar("select a.hn, hhorario from horario a, programahorario b where".
		                           " b.phhorario = a.hn and b.phprograma = ".$input->programa);
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca todos los espacios definidos en la tabla espacio.
	*
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarespaciotodo($input) {
		$this->conexion();
		$response = $this->mostrar("select a.en, a.eespacio from espacio a");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca todos los departamentos definidos en la tabla departamento.
	*
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscardepartamentotodo($input) {
		$this->conexion();
		$response = $this->mostrar("select a.dn, a.ddepartamento from departamento a");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca departamento definido en la tabla departamento.
	*
	* @param string $input->departamento el departamento a buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscardepartamento($input) {
		$this->conexion();
		$response = $this->mostrar("select a.dn, a.ddepartamento from departamento a where a.ddepartamento = '".
		                           $input->departamento."'");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca ciudad definido en la tabla ciudad segun un departamento.
	*
	* @param int $input->departamento el departamento al que pertenece la ciudad a buscar
	* @param string $input->ciudad el ciudad a buscar
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarciudaddepartamento($input) {
		$this->conexion();
		$response = $this->mostrar("select a.cn, a.cciudad, a.cdepartamento from ciudad a where a.cdepartamento = ".
		                           $input->departamento." and a.cciudad like '".$input->ciudad."%' limit 10");
		$this->desconexion();
		return $response;
	}

	/**
	* Esta funcion busca todos las clasificaciones definidos en la tabla clasificacion.
	*
	* @return int resquery->error que es 0 cuando no existe un error
	*		  matriz resquery->matriz que contiene el resultado de la consulta
	*/
	public function buscarclasificaciontodo($input) {
		$this->conexion();
		$response = $this->mostrar("select a.cn, a.cclasificacion from clasificacion a");
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

