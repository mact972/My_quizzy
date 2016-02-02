<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Categorie\Controller\Categorie' => 'Categorie\Controller\CategorieController',
         ),
     ),

     'router' => array(
         'routes' => array(
             'categorie' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/categorie[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Categorie\Controller\Categorie',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'categorie' => __DIR__ . '/../view',
         ),
     ),
 );