<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
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

class buscarprotagonistaentradas {

    /**
     * @var string
     */
    public $protagonista;

}

class buscartmedioentradas {

    /**
     * @var string
     */
    public $tmedio;

}

class buscarmediotmedioentradas {

    /**
     * @var int
     */
    public $tmedio;

    /**
     * @var string
     */
    public $medio;

}

class buscarmedioentradas {

    /**
     * @var string
     */
    public $medio;

}

class buscarprogramamedioentradas {

    /**
     * @var string
     */
    public $programa;

    /**
     * @var int
     */
    public $medio;

}

class buscarprogramaentradas {

    /**
     * @var string
     */
    public $programa;

}

class buscarhorarioprogramaentradas {

    /**
     * @var int
     */
    public $programa;

}

class buscardepartamentoentradas {

    /**
     * @var string
     */
    public $departamento;

}

class buscarciudaddepartamentoentradas {

    /**
     * @var string
     */
    public $ciudad;

    /**
     * @var int
     */
    public $departamento;

}

class buscaclasificacionentradas {

    /**
     * @var string
     */
    public $clasificacion;

}

class buscarusuariouserentradas {

    /**
     * @var string
     */
    public $user;

}

class buscaespacioentradas {

    /**
     * @var string
     */
    public $espacio;

}

class buscartarchivoextencionentradas {

    /**
     * @var string
     */
    public $extencion;

}

class insertararchivoentradas {

    /**
     * @var string
     */
    public $fecha;

    /**
     * @var string
     */
    public $titular;

    /**
     * @var string
     */
    public $protagonista;

    /**
     * @var string
     */
    public $resumen;

    /**
     * @var string
     */
    public $programa;

    /**
     * @var string
     */
    public $ciudad;

    /**
     * @var string
     */
    public $clasificacion;

    /**
     * @var string
     */
    public $usuarioactualizacion;

    /**
     * @var string
     */
    public $fechaactualizacion;

    /**
     * @var string
     */
    public $vistas;

    /**
     * @var string
     */
    public $usuariocargado;

    /**
     * @var string
     */
    public $fechacargado;

    /**
     * @var string
     */
    public $dirrecion;

    /**
     * @var string
     */
    public $espacio;

    /**
     * @var string
     */
    public $tipo;

}

/**
* @var array
*/
$classMap = array(
	'res' => 'res',
	'resquery' => 'resquery',
	'filas' => 'filas',
    'buscarprotagonistaentradas' => 'buscarprotagonistaentradas',
    'buscartmedioentradas' => 'buscartmedioentradas',
    'buscarmediotmedioentradas' => 'buscarmediotmedioentradas',
    'buscarmedioentradas' => 'buscarmedioentradas',
    'buscarprogramamedioentradas' => 'buscarprogramamedioentradas',
    'buscarhorarioprogramaentradas' => 'buscarhorarioprogramaentradas',
    'buscardepartamentoentradas' => 'buscardepartamentoentradas',
    'buscarciudaddepartamentoentradas' => 'buscarciudaddepartamentoentradas',
    'buscaclasificacionentradas' => 'buscaclasificacionentradas',
    'buscarusuariouserentradas' => 'buscarusuariouserentradas',
    'buscaespacioentradas' => 'buscaespacioentradas',
    'buscartarchivoextencionentradas' => 'buscartarchivoextencionentradas',
    'insertararchivoentradas' => 'insertararchivoentradas'
);

