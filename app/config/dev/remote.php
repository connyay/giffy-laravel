<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Remote Server Connections
    |--------------------------------------------------------------------------
    |
    | These are the servers that will be accessible via the SSH task runner
    | facilities of Laravel. This feature radically simplifies executing
    | tasks on your servers, such as deploying out these applications.
    |
    */

    'connections' => array(

        'production' => array(
            'host'      => 'giffy.dev',
            'username'  => 'vagrant',
            'password'  => 'vagrant',
            'key'       => '',
            'keyphrase' => '',
            'root'      => '/var/www/giffy.co',
        ),

    ),

);
