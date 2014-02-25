<?php

$loader = new \Phalcon\Loader();

/*$loader->registerNamespaces(array(
    'Example\Models' => $config->application->modelsDir,
    'Example\Controllers' => $config->application->controllersDir,
    'Example' => $config->application->libraryDir
));

$loader->register();
*/
/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->formsDir
    )
)->register();
