<?php
namespace Religion\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Religion\Model\Religion;
use Religion\Form\ReligionForm;  

 class ReligionController extends AbstractActionController
 {
     public function indexAction()
     {

     	 return new ViewModel(array(
             'religions' => $this->getReligionTable()->fetchAll(),
         ));

     }

     public function addAction()
     {

     	$form = new ReligionForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $religion = new Religion();
             $form->setInputFilter($religion->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $religion->exchangeArray($form->getData());
                 $this->getReligionTable()->saveReligion($religion);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('religion');
             }
         }
         return array('form' => $form);

     }

     public function editAction()
     {

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('religion', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $religion = $this->getReligionTable()->getReligion($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('religion', array(
                 'action' => 'index'
             ));
         }

         $form  = new ReligionForm();
         $form->bind($religion);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($religion->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getReligionTable()->saveReligion($religion);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('religion');
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
             return $this->redirect()->toRoute('religion');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getReligionTable()->deleteReligion($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('religion');
         }

         return array(
             'id'    => $id,
             'nature' => $this->getReligionTable()->getReligion($id)
         );

     }

     protected $religionTable;

      public function getReligionTable()
     {
         if (!$this->religionTable) {
             $sm = $this->getServiceLocator();
             $this->religionTable = $sm->get('Religion\Model\ReligionTable');
         }
         return $this->religionTable;
     }
 }