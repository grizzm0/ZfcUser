<?php
namespace ZfcUser\Factory\InputFilter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUser\InputFilter\RegistrationFilter;

class RegistrationFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \ZfcUser\Options\RegistrationOptionsInterface   $registrationOptions
         * @var \Zend\InputFilter\InputFilterPluginManager      $serviceLocator
         * @var \Zend\ServiceManager\ServiceManager             $serviceManager
         */
        $serviceManager         = $serviceLocator->getServiceLocator();
        $registrationOptions    = $serviceManager->get('zfcuser_module_options');

        return new RegistrationFilter($registrationOptions);
    }
}
