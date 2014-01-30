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

/**
* @var array
*/
$GLOBALS['classMapdb'] = array(
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
    'buscarciudaddepartamentoentradas' => 'buscarciudaddepartamentoentradas'
);

