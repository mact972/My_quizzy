<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Histoire\Controller\Histoire' => 'Histoire\Controller\HistoireController',
         ),
     ),

     'router' => array(
         'routes' => array(
             'histoire' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/histoire[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Histoire\Controller\Histoire',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'histoire' => __DIR__ . '/../view',
         ),
     ),
 );