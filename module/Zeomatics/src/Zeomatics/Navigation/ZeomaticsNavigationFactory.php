<?php
namespace Zeomatics\Navigation;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ZeomaticsNavigationFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = new ZeomaticsNavigation();
        return $navigation->createService($serviceLocator);
    }
}