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

class buscarprotagonistaentradas {

    /**
     * @var string
     */
    public $protagonista;

}

/**
* @var array
*/
$classMap = array(
	'res' => 'res',
	'resquery' => 'resquery',
	'filas' => 'filas',
    'buscarprotagonistaentradas' => 'buscarprotagonistaentradas'
);

