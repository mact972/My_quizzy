<?php
namespace Religion\Model;

use Zend\Db\TableGateway\TableGateway;

 class ReligionTable
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

     public function getReligion($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveReligion(Religion $religion)
     {
         $data = array(
             'categorie' => $religion->categorie,
             'question'  => $religion->question,
             'prop1' => $religion->prop1,
             'prop2' => $religion->prop2,
             'prop3' => $religion->prop3,
             'prop4' => $religion->prop4,
             'reponse' => $religion->reponse,
         );

         $id = (int) $religion->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getReligion($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Religion id does not exist');
             }
         }
     }

     public function deleteReligion($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }