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

/**
* @var array
*/
$GLOBALS['classMapdb'] = array(
	'res' => 'res',
    'resquery' => 'resquery',
    'filas' => 'filas',
    'buscarprotagonistaentradas' => 'buscarprotagonistaentradas'
);

