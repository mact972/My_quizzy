<?php
namespace Nature\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Nature\Model\Nature;
use Nature\Form\NatureForm;  

 class NatureController extends AbstractActionController
 {
     public function indexAction()
     {

     	 return new ViewModel(array(
             'natures' => $this->getNatureTable()->fetchAll(),
         ));

     }

     public function addAction()
     {

     	$form = new NatureForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $nature = new Nature();
             $form->setInputFilter($nature->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $nature->exchangeArray($form->getData());
                 $this->getNatureTable()->saveNature($nature);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('nature');
             }
         }
         return array('form' => $form);

     }

     public function editAction()
     {

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('nature', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $nature = $this->getNatureTable()->getNature($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('nature', array(
                 'action' => 'index'
             ));
         }

         $form  = new NatureForm();
         $form->bind($nature);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($nature->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getNatureTable()->saveNature($nature);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('nature');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );

     }

     public function deleteAction()
     {

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('nature');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getNatureTable()->deleteNature($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('nature');
         }

         return array(
             'id'    => $id,
             'nature' => $this->getNatureTable()->getNature($id)
         );

     }

     protected $natureTable;

      public function getNatureTable()
     {
         if (!$this->natureTable) {
             $sm = $this->getServiceLocator();
             $this->natureTable = $sm->get('Nature\Model\NatureTable');
         }
         return $this->natureTable;
     }
 }