<?php
namespace Histoire\Model;

use Zend\Db\TableGateway\TableGateway;

 class HistoireTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getHistoire($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveHistoire(Histoire $histoire)
     {
         $data = array(
             'categorie' => $histoire->categorie,
             'question'  => $histoire->question,
             'prop1' => $histoire->prop1,
             'prop2' => $histoire->prop2,
             'prop3' => $histoire->prop3,
             'prop4' => $histoire->prop4,
             'reponse' => $histoire->reponse,
         );

         $id = (int) $histoire->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getHistoire($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Histoire id does not exist');
             }
         }
     }

     public function deleteHistoire($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }