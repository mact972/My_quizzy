<?php
namespace Nature;

use Nature\Model\Nature;
use Nature\Model\NatureTable;
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
                 'Nature\Model\NatureTable' =>  function($sm) {
                     $tableGateway = $sm->get('NatureTableGateway');
                     $table = new NatureTable($tableGateway);
                     return $table;
                 },
                 'NatureTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Nature());
                     return new TableGateway('quizz', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }