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
//        $message = $this->params()->fromQuery('message','foo');
////        $mapper = $this->getDataMapper();
////        return new ViewModel(array('exams' => $mapper->fetchAll()));
//        return new ViewModel(array('message'=>$message));
     }
     
     public function servicesAction(){
//        $mapper = $this->getDataMapper();
//        return new ViewModel();
     }
     public function technologyAction(){

    }
     public function aboutAction(){

    }
     public function portfolioAction(){

    }
     public function contactAction(){

    }
     
    
    public function getDataMapper(){
          $sm = $this->getServiceLocator();
          return $sm->get('DataMapper');
    }
 }