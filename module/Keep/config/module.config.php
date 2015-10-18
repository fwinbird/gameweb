<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'keep-heroadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/hero/add',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'heroadd'
                    ),
                ),
            ),

            'keep-herodisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/hero[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'herodisplay'
                    ),
                ),
            ),
            'keep-raceadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/race/add',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'raceadd'
                    ),
                ),
            ),
            
            'keep-vocationadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/vocation/add',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'vocationadd'
                    ),
                ),
            ),

            'keep-campadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/camp/add',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'campadd'
                    ),
                ),
            ),

            'keep-stepadd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/step/add',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'stepadd'
                    ),
                ),
            ),

            'keep-skilladd' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/skill/add',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'skilladd'
                    ),
                ),
            ),

            'keep-racedisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/race[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'racedisplay'
                    ),
                ),
            ),

            'keep-vocationdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/vocation[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'vocationdisplay'
                    ),
                ),
            ),

            'keep-campdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/camp[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'campdisplay'
                    ),
                ),
            ),

            'keep-stepdisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/step[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'stepdisplay'
                    ),
                ),
            ),

            'keep-skilldisplay' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/keep/skill[/]',
                    'defaults' => array(
                        'controller' => 'Keep\Controller\Index',
                        'action' => 'skilldisplay'
                    ),
                ),
            ),

        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Keep\Controller\Index' => 'Keep\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);