<?php
date_default_timezone_set('America/Toronto');

require 'vendor/autoload.php';

define('ROOT_PATH', dirname(__FILE__));
define('TESTS_PATH', implode('/', [ROOT_PATH, 'tests']));
define('STORAGE_PATH', implode('/', [ROOT_PATH, 'storage']));

/**
 * @codeCoverageIgnore
 */
function config()
{
    return include implode('/', [ROOT_PATH, 'config.php']);
}

/**
 * @codeCoverageIgnore
 */
function dd($item)
{
    var_dump($item);
    die;
}