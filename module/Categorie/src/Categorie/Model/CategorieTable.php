<?php
namespace Categorie\Model;

 use Zend\Db\TableGateway\TableGateway;

 class CategorieTable
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

     public function getCategorie($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveCategorie(Categorie $categorie)
     {
         $data = array(
             'image' => $categorie->image,
             'titre'  => $categorie->titre,
         );

         $id = (int) $categorie->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCategorie($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Album id does not exist');
             }
         }
     }

     public function deleteCategorie($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }