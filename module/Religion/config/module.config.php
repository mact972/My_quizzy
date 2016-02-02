<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Religion\Controller\Religion' => 'Religion\Controller\ReligionController',
         ),
     ),

     'router' => array(
         'routes' => array(
             'religion' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/religion[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Religion\Controller\Religion',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'religion' => __DIR__ . '/../view',
         ),
     ),
 );