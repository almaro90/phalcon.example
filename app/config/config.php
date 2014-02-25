<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'PostgreSQL',
        'host'        => 'localhost',
        'username'    => 'usuario',
        'password'    => 'usuario',
        'dbname'      => 'datos',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'formsDir'       => __DIR__ . '/../../app/forms/',
        'baseUri'        => '/web/phalcon.example/',
    )
));
