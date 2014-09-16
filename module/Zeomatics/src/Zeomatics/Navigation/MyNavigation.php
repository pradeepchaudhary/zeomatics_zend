<?php
/*Navigation code as per the Stack overflow example*/
//namespace Zeomatics\Navigation;
//
//use Zend\ServiceManager\ServiceLocatorInterface;
//use Zend\Navigation\Service\DefaultNavigationFactory;
//use Admin\Model\Entity\Tablepages;
//class MyNavigation extends DefaultNavigationFactory
//{
//    protected function getPages(ServiceLocatorInterface $serviceLocator)
//    {
//
//        if (null === $this->pages) {
//
//            $fetchMenu = $serviceLocator->get('menu')->fetchAll();
//
//
//            $configuration['navigation'][$this->getName()] = array();
//
//
//
//            foreach($fetchMenu as $key=>$row)
//            {
//
//                $subMenu = $serviceLocator->get('menu')->fetchAllSubMenus($row['id']);
//
//           if($subMenu){
//              $pages = array();
//                foreach($subMenu as $k=>$v)
//                {
//                    foreach($v as $field=>$value){
//                        $page['label'] =$value['heading'];
//                        $page['route'] = 'visas';
//                        if ($value['path'] == $row['path']){
//                        $page['params'] = array('action'=>'index',
//                                                 'category'=> $this->$row['path'],
//
//                        );
//
//
//                        }
//
//                        $subCatMenu = $serviceLocator->get('menu')->fetchAllSubCatMenus($value['id']);
//
//                        $subcatpages = array();
//                        $subcatgroup = array();
//                        $group = array();
//                        if($subCatMenu>0){
//
//                        foreach($subCatMenu as $k=>$v)
//                        {
//                            foreach($v as $field=>$value1){
//
//                                $subpage['label'] =$value1['heading'];
//                                $subpage['route'] = 'visas';
//                                if ($value['path'] ==$row['path']){
//
//                                    $subpage['params'] = array('action'=>'index',
//                                          'category'=> $row['path'],
//                                          'sub_category'=> $value1['path']);
//
//
//                                }elseif($row['id'] ==76){
//                                    $subpage['params'] = array('action'=>'index',
//                                            'category'=>$value['path'],
//                                            'sub_category'=>$value1['path']);
//
//
//                                }else{
//
//                                $subpage['params'] = array('action'=>'index',
//                                            'category'=> $row['path'],
//                                            'sub_category'=> $value['path'],
//                                            'id'=> $value1['path']);
//                                }
//
//                            }
//                            $group[] =$subpage;
//
//
//                         }
//
//                       $page['pages'] =$group;
//                       $pages[] =$page;
//
//
//                        }
//
//
//                        }
//
//               }
//
//
//           }
//
//
//               $configuration['navigation'][$this->getName()][$row['name']] = array(
//                    'label' => $row['name'],
//
//                     'route' => 'visas',
//                    'params'       => array(
//                            'action' => 'index',
//                            'category' => $row['path'],
//
//                    ),
//
//                   'pages' =>  $pages,
//
//                );
//
//
//            }
//
//
//
//            if (!isset($configuration['navigation'])) {
//
//                throw new Exception\InvalidArgumentException('Could not find navigation configuration key');
//            }
//            if (!isset($configuration['navigation'][$this->getName()])) {
//
//                throw new Exception\InvalidArgumentException(sprintf(
//                    'Failed to find a navigation container by the name "%s"',
//                    $this->getName()
//                ));
//            }
//
//            $application = $serviceLocator->get('Zeomatics');
//
//            $routeMatch  = $application->getMvcEvent()->getRouteMatch();
//
//            $router      = $application->getMvcEvent()->getRouter();
//            $pages       = $this->getPagesFromConfig($configuration['navigation'][$this->getName()]);
//
//
//            $this->pages = $this->injectComponents($pages, $routeMatch, $router);
//        }
//
//        return $this->pages;
//    }
//}

/*Navigation code as per samsonasik.wordpress.com using the database table*/
namespace Zeomatics\Navigation;
 
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;
 
class MyNavigation extends DefaultNavigationFactory
{
    protected function getPages(ServiceLocatorInterface $serviceLocator)
    {
        if (null === $this->pages) {
            //FETCH data from table menu :
            $fetchMenu = $serviceLocator->get('menu')->fetchAll();
 
            $configuration['navigation'][$this->getName()] = array();
            foreach($fetchMenu as $key=>$row)
            {
                $configuration['navigation'][$this->getName()][$row['name']] = array(
                    'label' => $row['label'],
                    'route' => $row['route'],
                );
            }
             
            if (!isset($configuration['navigation'])) {
                throw new Exception\InvalidArgumentException('Could not find navigation configuration key');
            }
            if (!isset($configuration['navigation'][$this->getName()])) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Failed to find a navigation container by the name "%s"',
                    $this->getName()
                ));
            }
 
            $application = $serviceLocator->get('Application');
            $routeMatch  = $application->getMvcEvent()->getRouteMatch();
            $router      = $application->getMvcEvent()->getRouter();
            $pages       = $this->getPagesFromConfig($configuration['navigation'][$this->getName()]);
 
            $this->pages = $this->injectComponents($pages, $routeMatch, $router);
        }
        return $this->pages;
    }
}