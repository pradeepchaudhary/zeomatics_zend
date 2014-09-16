<?php
namespace Zeomatics;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Application;

class Module
{   /*Code to handle all 404 errors*/
//    public function onBootstrap(MvcEvent $e)
//    {
//        $eventManager = $e->getApplication()->getEventManager();
//        $sharedManager = $eventManager->getSharedManager();
//        //controller can't dispatch request action that passed to the url
//        $sharedManager->attach('Zend\Mvc\Controller\AbstractActionController',
//               'dispatch',
//               array($this, 'handleControllerCannotDispatchRequest' ), 101);
//        //controller not found, invalid, or route is not matched anymore
//        $eventManager->attach('dispatch.error', 
//               array($this,
//              'handleControllerNotFoundAndControllerInvalidAndRouteNotFound' ), 100);
//    }
//     
//    public function handleControllerCannotDispatchRequest(MvcEvent $e)
//    {
//        $action = $e->getRouteMatch()->getParam('action');
//        $controller = get_class($e->getTarget());
//         
//        // error-controller-cannot-dispatch
//        if (! method_exists($e->getTarget(), $action.'Action')) {
//            $logText = 'The requested controller '.
//                        $controller.' was unable to dispatch the request : '.$action.'Action';
//            //you can do logging, redirect, etc here..
//             echo $logText;
//        }
//    }
//     
//    public function handleControllerNotFoundAndControllerInvalidAndRouteNotFound(MvcEvent $e)
//    {
//        $error  = $e->getError();
//        if ($error == Application::ERROR_CONTROLLER_NOT_FOUND) {
//            //there is no controller named $e->getRouteMatch()->getParam('controller')
//            $logText =  'The requested controller '
//                        .$e->getRouteMatch()->getParam('controller'). '  could not be mapped to an existing controller class.';
//             
//            //you can do logging, redirect, etc here..
//            echo $logText;
//        }
//         
//        if ($error == Application::ERROR_CONTROLLER_INVALID) {
//            //the controller doesn't extends AbstractActionController
//            $logText =  'The requested controller '
//                        .$e->getRouteMatch()->getParam('controller'). ' is not dispatchable';
//             
//            //you can do logging, redirect, etc here..
//            echo $logText;
//        }
//         
//        if ($error == Application::ERROR_ROUTER_NO_MATCH) {
//            // the url doesn't match route, for example, there is no /foo literal of route
//            $logText =  'The requested URL could not be matched by routing.';
//            //you can do logging, redirect, etc here...
//            echo $logText;
//        }
//    } /*404 error ends*/
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
//    public function getServiceConfig(){
//         return array(
//             'factories' => array(
//                 'Navigation' => 'Zeomatics\Navigation\ZeomaticsNavigationFactory',
//             ),
//         );
//     }
    
     /*Code from samsonasik example for navigation*/
     public function getServiceConfig()
    {
        return array(
            'initializers' => array(
                function ($instance, $sm) {
                    if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
                        $instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                    }
                }
            ),
            'invokables' => array(
                 'menu' => 'Zeomatics\Model\MenuTable'
            ),
            'factories' => array(
                'Navigation' => 'Zeomatics\Navigation\MyNavigationFactory'
            )
          );
    }
     
    
    /*Code from stackoverflow example for navigation*/
//    public function getServiceConfig()
//    {
//        return array(
//                'initializers' => array(
//                        function ($instance, $sm) {
//                            if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
//                                $instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
//                            }
//                        }
//                ),
//                'invokables' => array(
//                        'menu' => 'Zeomatics\Model\MenuTable',
//
//                ),
//
//                'factories' => array(
//                        'Navigation' => 'Zeomatics\Navigation\MyNavigationFactory'
//                )
//        );
//    } 
}
