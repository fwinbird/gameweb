<?php

return array(
    'router' => array(
        'routes' => array(
            'gameuser' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/gameuser[/]',
                    'defaults' => array(
                        'controller' => 'Gameuser\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'gameuser-register' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/gameuser/register[/]',
                    'defaults' => array(
                        'controller' => 'Gameuser\Controller\Index',
                        'action'     => 'register',
                    ),
                ),
            ),

        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Gameuser\Controller\Index' => 'Gameuser\Controller\IndexController'
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout/index'	=> __DIR__ . '/../view/layout/index.phtml',
//            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),

    ),
);