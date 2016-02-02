<?php
namespace Categorie;

use Categorie\Model\Categorie;
use Categorie\Model\CategorieTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

 class Module
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }

     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Categorie\Model\CategorieTable' =>  function($sm) {
                     $tableGateway = $sm->get('CategorieTableGateway');
                     $table = new CategorieTable($tableGateway);
                     return $table;
                 },
                 'CategorieTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Categorie());
                     return new TableGateway('categorie', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }