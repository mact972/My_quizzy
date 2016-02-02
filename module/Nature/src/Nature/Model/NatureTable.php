<?php
namespace Nature\Model;

use Zend\Db\TableGateway\TableGateway;

 class NatureTable
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

     public function getNature($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveNature(Nature $nature)
     {
         $data = array(
             'categorie' => $nature->categorie,
             'question'  => $nature->question,
             'prop1' => $nature->prop1,
             'prop2' => $nature->prop2,
             'prop3' => $nature->prop3,
             'prop4' => $nature->prop4,
             'reponse' => $nature->reponse,
         );

         $id = (int) $nature->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getNature($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Nature id does not exist');
             }
         }
     }

     public function deleteNature($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }