<?php
namespace Film\Model;

 use Zend\Db\TableGateway\TableGateway;

 class FilmTable
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

     public function getFilm($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveFilm(Film $film)
     {
         $data = array(
             'categorie' => $film->categorie,
             'question'  => $film->question,
             'prop1'  => $film->prop1,
             'prop2'  => $film->prop2,
             'prop3'  => $film->prop3,
             'prop4'  => $film->prop4,
             'reponse'  => $film->reponse,


         );

         $id = (int) $film->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getFilm($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Film id does not exist');
             }
         }
     }

     public function deleteFilm($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }