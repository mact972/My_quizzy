<?php
namespace Religion;

use Religion\Model\Religion;
use Religion\Model\ReligionTable;
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
                 'Religion\Model\ReligionTable' =>  function($sm) {
                     $tableGateway = $sm->get('ReligionTableGateway');
                     $table = new ReligionTable($tableGateway);
                     return $table;
                 },
                 'ReligionTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Religion());
                     return new TableGateway('quizz', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }