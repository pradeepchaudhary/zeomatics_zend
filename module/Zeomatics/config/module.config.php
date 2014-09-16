<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Zeomatics\Controller\Zero' => 'Zeomatics\Controller\ZeroController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'zero' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/zero',
//                    'constraints' => array(
//                        'action' => '^|add|edit|delete|services|$',
//                        'id'     => '[0-9]+',
//                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Zeomatics\Controller',
                        'controller'    => 'Zero',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'services' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/services[/:id]',
                            'constraints' => array(
                                    'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                    'controller' => 'Zeomatics\Controller\Zero',
                                    'action'     => 'services',
                            ),
                        ),
                    ),
                    'technology' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/technology[/:id]',
                            'constraints' => array(
                                    'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                    'controller' => 'Zeomatics\Controller\Zero',
                                    'action'     => 'technology',
                            ),
                        ),
                    ),
                    'about' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/about[/:id]',
                            'constraints' => array(
                                    'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                    'controller' => 'Zeomatics\Controller\Zero',
                                    'action'     => 'about',
                            ),
                        ),
                    ),
                    'portfolio' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/portfolio[/:id]',
                            'constraints' => array(
                                    'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                    'controller' => 'Zeomatics\Controller\Zero',
                                    'action'     => 'portfolio',
                            ),
                        ),
                    ),
                    'contact' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/contact[/:id]',
                            'constraints' => array(
                                    'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                    'controller' => 'Zeomatics\Controller\Zero',
                                    'action'     => 'contact',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'zeomatics' => __DIR__ . '/../view',
        ),
        //Overriding the default layout
        'template_map' => array(
        'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
        ),
    ),
);