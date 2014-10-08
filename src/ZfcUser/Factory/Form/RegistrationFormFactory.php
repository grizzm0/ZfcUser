<?php
namespace ZfcUser\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUser\Form\RegistrationForm;
use ZfcUser\InputFilter\RegistrationFilter;
use ZfcUser\Validator\NoRecordExists;
use ZfcUser\Options;

class RegistrationFormFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        return new RegistrationForm();

        /* @var $options Options\ModuleOptions */
        $options = $serviceManager->get('zfcuser_module_options');

        $userMapper = $serviceManager->get('zfcuser_user_mapper');

        $emailValidator = new NoRecordExists(array(
            'mapper' => $userMapper,
            'key' => 'email',
        ));

        $userNameValidator = new NoRecordExists(array(
            'mapper' => $userMapper,
            'key' => 'username',
        ));

        $inputFilter = new RegisterFilter(
            $emailValidator,
            $userNameValidator,
            $options
        );

        $form = new Register(null, $options);
        // $form->setCaptchaElement($sm->get('zfcuser_captcha_element'));
        $form->setInputFilter($inputFilter);

        return $form;
    }
}
