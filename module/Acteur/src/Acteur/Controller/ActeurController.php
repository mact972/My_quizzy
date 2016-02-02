<?php
namespace Acteur\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Acteur\Model\Acteur;
use Acteur\Form\ActeurForm;  

 class ActeurController extends AbstractActionController
 {
     public function indexAction()
     {

     	 return new ViewModel(array(
             'acteurs' => $this->getActeurTable()->fetchAll(),
         ));

     }

     public function addAction()
     {

     	$form = new ActeurForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $acteur = new Acteur();
             $form->setInputFilter($acteur->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $acteur->exchangeArray($form->getData());
                 $this->getActeurTable()->saveActeur($acteur);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('acteur');
             }
         }
         return array('form' => $form);

     }

     public function editAction()
     {

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('acteur', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $acteur = $this->getActeurTable()->getActeur($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('acteur', array(
                 'action' => 'index'
             ));
         }

         $form  = new ActeurForm();
         $form->bind($acteur);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($acteur->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getActeurTable()->saveActeur($acteur);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('acteur');
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
             return $this->redirect()->toRoute('acteur');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getActeurTable()->deleteActeur($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('acteur');
         }

         return array(
             'id'    => $id,
             'acteur' => $this->getActeurTable()->getActeur($id)
         );

     }

     protected $acteurTable;

      public function getActeurTable()
     {
         if (!$this->acteurTable) {
             $sm = $this->getServiceLocator();
             $this->acteurTable = $sm->get('Acteur\Model\ActeurTable');
         }
         return $this->acteurTable;
     }
 }