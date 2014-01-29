<?php
/**
 * @author Marcelo Heredia
 * Jan, 2014
*/
class autocompleteprogramaentradas {

    /**
     * @var string
     */
    public $medio;

    /**
     * @var string
     */
    public $programa;

}

class autocompleteprogramasalidas {

    /**
     * @var array of string
     */
    public $programa;

    /**
     * @var string
     */
    public $error;

}

/**
 * @var array
 */
$GLOBALS['classMapprograma'] = array(
	'autocompleteprogramaentradas' => 'autocompleteprogramaentradas',
	'autocompleteprogramasalidas' => 'autocompleteprogramasalidas'
);

