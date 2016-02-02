<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Qcm\Controller\Qcm' => 'Qcm\Controller\QcmController',
         ),
     ),

     'router' => array(
         'routes' => array(
             'qcm' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/qcm[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Qcm\Controller\Qcm',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'qcm' => __DIR__ . '/../view',
         ),
     ),
 );