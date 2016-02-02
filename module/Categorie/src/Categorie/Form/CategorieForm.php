<?php
namespace Categorie\Form;

 use Zend\Form\Form;

 class CategorieForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('categorie');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'titre',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Titre',
             ),
         ));
         $this->add(array(
             'name' => 'image',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Image',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }