<?php
namespace Qcm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Qcm\Model\Qcm;
use Qcm\Form\QcmForm;  

 class QcmController extends AbstractActionController
 {
     public function indexAction()
     {

     	 return new ViewModel(array(
             'qcms' => $this->getQcmTable()->fetchAll(),
         ));

     }

     public function addAction()
     {

     	$form = new QcmForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $qcm = new Qcm();
             $form->setInputFilter($qcm->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $qcm->exchangeArray($form->getData());
                 $this->getQcmTable()->saveQcm($qcm);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('qcm');
             }
         }
         return array('form' => $form);

     }

     public function editAction()
     {

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('qcm', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $qcm = $this->getQcmTable()->getQcm($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('qcm', array(
                 'action' => 'index'
             ));
         }

         $form  = new QcmForm();
         $form->bind($qcm);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($qcm->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getQcmTable()->saveQcm($qcm);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('qcm');
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
             return $this->redirect()->toRoute('qcm');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getQcmTable()->deleteQcm($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('qcm');
         }

         return array(
             'id'    => $id,
             'qcm' => $this->getQcmTable()->getQcm($id)
         );

     }

     protected $qcmTable;

      public function getQcmTable()
     {
         if (!$this->qcmTable) {
             $sm = $this->getServiceLocator();
             $this->qcmTable = $sm->get('Qcm\Model\QcmTable');
         }
         return $this->qcmTable;
     }
 }