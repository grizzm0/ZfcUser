<?php
namespace ZfcUser\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUser\Form\LoginForm;
use Zfcuser\InputFilter\LoginFilter;
use ZfcUser\Options;

class LoginFormFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        return new LoginForm();

        /* @var $options Options\ModuleOptions */
        $options = $serviceManager->get('zfcuser_module_options');

        $inputFilter = new LoginFilter($options);

        $form = new Login(null, $options);
        $form->setInputFilter($inputFilter);

        return $form;
    }
}
