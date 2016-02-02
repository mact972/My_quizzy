<?php
namespace Qcm\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


 class Qcm
 {
     public $quizz_id;
     public $categorie;
     public $question;
     public $prop1;
     public $prop2;
     public $prop3;
     public $prop4;
     public $reponse;
     protected $inputFilter; 

     public function exchangeArray($data)
     {
         $this->quizz_id     = (!empty($data['quizz_id'])) ? $data['quizz_id'] : null;
         $this->categorie = (!empty($data['categorie'])) ? $data['categorie'] : null;
         $this->question  = (!empty($data['question'])) ? $data['question'] : null;
         $this->prop1  = (!empty($data['prop1'])) ? $data['prop1'] : null;
         $this->prop2  = (!empty($data['prop2'])) ? $data['prop2'] : null;
         $this->prop3  = (!empty($data['prop3'])) ? $data['prop3'] : null;
         $this->prop4  = (!empty($data['prop4'])) ? $data['prop4'] : null;
         $this->reponse  = (!empty($data['reponse'])) ? $data['reponse'] : null;

     }

     public function getArrayCopy()
     {
         return get_object_vars($this);
     }

     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'categorie',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'question',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'prop1',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'prop2',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'prop3',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'prop4',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 255,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }