<?php
return array(
    'modules' => array(
        'Common',
        'Api',
        'Keep',
        'Home',
        'Gameuser',
        'Users',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
