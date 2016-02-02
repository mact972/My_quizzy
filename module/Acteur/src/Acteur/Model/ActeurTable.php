<?php
namespace Acteur\Model;

use Zend\Db\TableGateway\TableGateway;

 class ActeurTable
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

     public function getActeur($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveActeur(Acteur $acteur)
     {
         $data = array(
             'categorie' => $acteur->categorie,
             'question'  => $acteur->question,
             'prop1' => $acteur->prop1,
             'prop2' => $acteur->prop2,
             'prop3' => $acteur->prop3,
             'prop4' => $acteur->prop4,
             'reponse' => $acteur->reponse,
         );

         $id = (int) $acteur->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getActeur($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Acteur id does not exist');
             }
         }
     }

     public function deleteActeur($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }