<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
*/

class mostrartmediossalidas {

    /**
     * @var array of string
     */
    public $tipo;

    /**
     * @var string
     */
    public $error;

}

class autocompletemedioentradas {

    /**
     * @var string
     */
    public $medio;

    /**
     * @var string
     */
    public $tmedio;

}

class autocompletemediosalidas {

    /**
     * @var array of string
     */
    public $medio;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$GLOBALS['classMapmedio'] = array(
	'mostrartmediossalidas' => 'mostrartmediossalidas',
    'autocompletemedioentrada' => 'autocompletemedioentrada',
    'autocompletemediosalidas' => 'autocompletemediosalidas'
);

