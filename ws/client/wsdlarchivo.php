<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
*/

class subirarchivoentradas {

    /**
     * @var string
     */
    public $archivo;

    /**
     * @var string
     */
    public $nombrearchivo;

}

class subirarchivosalidas {

    /**
     * @var string
     */
    public $error;

}
/**
 * @var array
 */
$GLOBALS['classMaparchivo'] = array(
	'subirarchivoentradas' => 'subirarchivoentradas',
    'subirarchivosalidas' => 'subirarchivosalidas'
);

