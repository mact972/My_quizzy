<?php
namespace Histoire\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Histoire\Model\Histoire;
use Histoire\Form\HistoireForm;  

 class HistoireController extends AbstractActionController
 {
     public function indexAction()
     {

     	 return new ViewModel(array(
             'histoires' => $this->getHistoireTable()->fetchAll(),
         ));

     }

     public function addAction()
     {

     	$form = new HistoireForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $histoire = new Histoire();
             $form->setInputFilter($histoire->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $histoire->exchangeArray($form->getData());
                 $this->getHistoireTable()->saveHistoire($histoire);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('histoire');
             }
         }
         return array('form' => $form);

     }

     public function editAction()
     {

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('histoire', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $histoire = $this->getHistoireTable()->getHistoire($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('histoire', array(
                 'action' => 'index'
             ));
         }

         $form  = new HistoireForm();
         $form->bind($histoire);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($histoire->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getHistoireTable()->saveHistoire($histoire);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('histoire');
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
             return $this->redirect()->toRoute('histoire');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getHistoireTable()->deleteHistoire($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('histoire');
         }

         return array(
             'id'    => $id,
             'histoire' => $this->getHistoireTable()->getHistoire($id)
         );

     }

     protected $histoireTable;

      public function getHistoireTable()
     {
         if (!$this->histoireTable) {
             $sm = $this->getServiceLocator();
             $this->histoireTable = $sm->get('Histoire\Model\HistoireTable');
         }
         return $this->histoireTable;
     }

     public function themeAction()
     {
        
     }
 }