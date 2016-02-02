<?php
namespace Qcm\Model;

use Zend\Db\TableGateway\TableGateway;

 class QcmTable
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

     public function getQcm($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveQcm(Qcm $qcm)
     {
         $data = array(
             'categorie' => $qcm->categorie,
             'question'  => $qcm->question,
             'prop1' => $qcm->prop1,
             'prop2' => $qcm->prop2,
             'prop3' => $qcm->prop3,
             'prop4' => $qcm->prop4,
             'reponse' => $qcm->reponse,
         );

         $id = (int) $qcm->quizz_id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getQcm($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Qcm id does not exist');
             }
         }
     }

     public function deleteQcm($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }