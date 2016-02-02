<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Acteur\Controller\Acteur' => 'Acteur\Controller\ActeurController',
         ),
     ),

     'router' => array(
         'routes' => array(
             'acteur' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/acteur[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Acteur\Controller\Acteur',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'acteur' => __DIR__ . '/../view',
         ),
     ),
 );