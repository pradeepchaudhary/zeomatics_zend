<?php
namespace Zeomatics\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zeomatics\Model\DataEntity;
use Zeomatics\Form\DataForm;

 class ZeroController extends AbstractActionController
 {
     public function indexAction()
     {
        $message = $this->params()->fromQuery('message','foo');
//        $mapper = $this->getDataMapper();
//        return new ViewModel(array('exams' => $mapper->fetchAll()));
        return new ViewModel(array('message'=>$message));
     }
     
     public function servicesAction(){
//        $mapper = $this->getDataMapper();
//        return new ViewModel();
     }
     public function technologyAction(){

    }
     public function newuserAction(){
        $mapper = $this->getDataMapper();
        return new ViewModel(array('users' => $mapper->fetchAll()));
     }

     public function addAction(){
        $form = new DataForm();
        $data = new DataEntity();
        $form->bind($data);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getDataMapper()->saveData($data);

                // Redirect to list of tasks
                return $this->redirect()->toRoute('data');
            }
        }

        return array('form' => $form);
    }
    
    public function editAction(){
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('data', array('action'=>'add'));
        }
        $data = $this->getDataMapper()->getData($id);
        
        $form = new DataForm();
        $form->bind($data);
        
        $request = $this->getRequest();
//        var_dump($request);
        if ($request->isPost()) {
            $form->setData($request->getPost());
//            var_dump($form);
            if ($form->isValid()) {
                $this->getDataMapper()->saveData($data);

                return $this->redirect()->toRoute('data');
            }
        }
        
        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    
    public function loginAction(){
        
    }
    
    public function applyAction(){
        
    }
    
    public function getDataMapper(){
          $sm = $this->getServiceLocator();
          return $sm->get('DataMapper');
    }
 }