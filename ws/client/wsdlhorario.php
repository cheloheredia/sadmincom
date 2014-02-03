<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
*/

class cargarcombohorarioentradas {

    /**
     * @var string
     */
    public $programa;

    /**
     * @var string
     */
    public $medio;

}

class cargarcombohorariosalidas {

    /**
     * @var array of string
     */
    public $horario;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$GLOBALS['classMaphorario'] = array(
	'mostrartmediossalidas' => 'mostrartmediossalidas',
    'cargarcombohorarioentradas' => 'cargarcombohorarioentradas'
);

