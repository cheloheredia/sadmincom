<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
*/
class autocompleteprotagonistaentradas {

    /**
     * @var string
     */
    public $protagonista;

}

class autocompleteprotagonistasalidas {

    /**
     * @var array of string
     */
    public $protagonista;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$GLOBALS['classMapprotagonista'] = array(
	'autocompleteprotagonistaentradas' => 'autocompleteprotagonistaentradas',
	'autocompleteprotagonistasalidas' => 'autocompleteprotagonistasalidas'
);

