<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
*/
class autocompleteciudadentradas {

    /**
     * @var string
     */
    public $departamento;

    /**
     * @var string
     */
    public $ciudad;

}

class autocompleteciudadsalidas {

    /**
     * @var array of string
     */
    public $ciudad;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$GLOBALS['classMapciudad'] = array(
	'autocompleteciudadentradas' => 'autocompleteciudadentradas',
	'autocompleteciudadsalidas' => 'autocompleteciudadsalidas'
);

