<?php
namespace ZfcUser\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUser\Form\LoginForm;

/**
 * Class LoginFormFactory
 * @package ZfcUser\Factory\Form
 */
class LoginFormFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return LoginForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Zend\Form\FormElementManager       $serviceLocator
         * @var \Zend\ServiceManager\ServiceManager $serviceManager
         */
        $serviceManager = $serviceLocator->getServiceLocator();

        $form = new LoginForm('login');
        $form->setInputFilter($serviceManager->get('InputFilterManager')->get('ZfcUser\InputFilter\LoginFilter'));

        return $form;
    }
}
