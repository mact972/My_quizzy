<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Nature\Controller\Nature' => 'Nature\Controller\NatureController',
         ),
     ),

     'router' => array(
         'routes' => array(
             'nature' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/nature[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Nature\Controller\Nature',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'nature' => __DIR__ . '/../view',
         ),
     ),
 );