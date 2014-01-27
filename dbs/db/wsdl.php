<?php
/**
 * @author Marcelo Heredia
 * Dec, 2013
*/
class res {

    /**
     * @var int
     */
    public $res;

}

class resquery {

    /**
     * @var array of filas
     */
    public $matriz;

    /**
     * @var int
     */
    public $error;

}

class filas {

    /**
     * @var array of string
     */
    public $columnas;

}

class buscarrevistaentradas {

    /**
     * @var string
     */
    public $revista;

}

class buscarpais {

    /**
     * @var string
     */
    public $pais;

}

class buscarcuidadentradas {

    /**
     * @var int
     */
    public $pais;

    /**
     * @var string
     */
    public $cuidad;

}

class registrarprospectoentradas {

    /**
     * @var int
     */
    public $cuidad;

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $apellido;

    /**
     * @var string
     */
    public $email;

    /**
     * @var datetime
     */
    public $fecha;

}

class buscarprospectoentradas {

    /**
     * @var int
     */
    public $cuidad;

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $apellido;

}

class actualizarprospectoentradas {

    /**
     * @var int
     */
    public $prospecto;

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $apellido;

    /**
     * @var string
     */
    public $email;

    /**
     * @var int
     */
    public $cuidad;

}

class buscartsuscripcionentradas {

    /**
     * @var string
     */
    public $tipo;

}

class buscarsuscripcionentradas {

    /**
     * @var int
     */
    public $prospecto;

    /**
     * @var int
     */
    public $revista;

    /**
     * @var int
     */
    public $tipo;

}

class insertarsuscripcionentradas {

    /**
     * @var int
     */
    public $prospecto;

    /**
     * @var int
     */
    public $revista;

    /**
     * @var int
     */
    public $tipo;

    /**
     * @var datetime
     */
    public $fecha;

}

/**
* @var array
*/
$classMap = array(
	'res' => 'res',
	'resquery' => 'resquery',
	'filas' => 'filas',
    'buscarrevistaentradas' => 'buscarrevistaentradas',
    'buscarpais' => 'buscarpais',
    'buscarcuidadentradas' => 'buscarcuidadentradas',
    'registrarprospectoentradas' => 'registrarprospectoentradas',
    'buscarprospectoentradas' => 'buscarprospectoentradas',
    'actualizarprospectoentradas' => 'actualizarprospectoentradas',
    'buscartsuscripcionentradas' => 'buscartsuscripcionentradas',
    'buscarsuscripcionentradas' => 'buscarsuscripcionentradas',
    'insertarsuscripcionentradas' => 'insertarsuscripcionentradas'
);

