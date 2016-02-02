<?php
namespace Histoire;

use Histoire\Model\Histoire;
use Histoire\Model\HistoireTable;
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
                 'Histoire\Model\HistoireTable' =>  function($sm) {
                     $tableGateway = $sm->get('HistoireTableGateway');
                     $table = new HistoireTable($tableGateway);
                     return $table;
                 },
                 'HistoireTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Histoire());
                     return new TableGateway('quizz', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }