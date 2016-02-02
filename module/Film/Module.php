<?php
namespace Film;
use Film\Model\Film;
use Film\Model\FilmTable;
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
                 'Film\Model\FilmTable' =>  function($sm) {
                     $tableGateway = $sm->get('FilmTableGateway');
                     $table = new FilmTable($tableGateway);
                     return $table;
                 },
                 'FilmTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Film());
                     return new TableGateway('quizz', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }