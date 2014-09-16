<?php
namespace Zeomatics\Navigation;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;

class ZeomaticsNavigation extends DefaultNavigationFactory
{
    protected function getPages(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = array();

        if (null === $this->pages) {
            $navigation[] = array (
//                'label' => 'Jaapsblog.nl',
//                'uri'   => 'http://www.jaapsblog.nl'
                'label' => 'Services',
                'route' => 'zero',
                'action' => 'services',
            );
            
            $mvcEvent = $serviceLocator->get('Application')->getMvcEvent();

            $routeMatch = $mvcEvent->getRouteMatch();
            $router     = $mvcEvent->getRouter();
            $pages      = $this->getPagesFromConfig($navigation);

            $this->pages = $this->injectComponents(
                $pages,
                $routeMatch,
                $router
            );
        }

        return $this->pages;
    }
}

/*Reference to add more and dynamic pages*/
//if (null === $this->pages) {
//    // ref to one of your tables
//    // in this case, getPages will simply fetch all pages
////    $pages = $serviceLocator->get('Page\Model\PageTable')->getPages();
//    $pages = $serviceLocator->get('menu')->fetchall();
//
//    if ($pages) { // ResultSet
//        foreach ($pages as $key => $page) { // loopz0r
//            $navigation[] = array(
//                'label' => $page->label,
//                'uri'   => $page->url_string
//            ); // props
//        }
//    }
////    ....
//}