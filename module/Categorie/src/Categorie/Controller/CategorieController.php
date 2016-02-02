<?php
namespace Categorie\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Categorie\Model\Categorie;          
use Categorie\Form\CategorieForm;  


 class CategorieController extends AbstractActionController
 {
     public function indexAction()
     {
        return new ViewModel(array(
             'categories' => $this->getCategorieTable()->fetchAll(),
         ));
     }

     public function addAction()
     {

        $form = new CategorieForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $categorie = new Categorie();
             $form->setInputFilter($categorie->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $categorie->exchangeArray($form->getData());
                 $this->getCategorieTable()->saveCategorie($categorie);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('categorie');
             }
         }
         return array('form' => $form);

     }

     public function editAction()
     {

        $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('categorie', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $categorie = $this->getCategorieTable()->getCategorie($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('categorie', array(
                 'action' => 'index'
             ));
         }

         $form  = new CategorieForm();
         $form->bind($categorie);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($categorie->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getCategorieTable()->saveCategorie($categorie);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('categorie');
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
             return $this->redirect()->toRoute('categorie');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getCategorieTable()->deleteCategorie($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('categorie');
         }

         return array(
             'id'    => $id,
             'categorie' => $this->getCategorieTable()->getCategorie($id)
         );

     }
        
    protected $categorieTable;
    
     public function getCategorieTable()
     {
         if (!$this->categorieTable) {
             $sm = $this->getServiceLocator();
             $this->categorieTable = $sm->get('Categorie\Model\CategorieTable');
         }
         return $this->categorieTable;
     }

     public function themeAction()
     {
        
     }
 }