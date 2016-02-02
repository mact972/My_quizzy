<?php
namespace Acteur\Form;

use Zend\Form\Form;

 class ActeurForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('acteur');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'categorie',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Categorie',
             ),
         ));
         
         $this->add(array(
             'name' => 'question',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Question',
             ),
         ));

         $this->add(array(
             'name' => 'prop1',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Prop1',
             ),
         ));

         $this->add(array(
             'name' => 'prop2',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Prop2',
             ),
         ));

         $this->add(array(
             'name' => 'prop3',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Prop3',
             ),
         ));

         $this->add(array(
             'name' => 'prop4',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Prop4',
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