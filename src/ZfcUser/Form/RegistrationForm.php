<?php
namespace ZfcUser\Form;

use Zend\Form\Form;
use ZfcUser\Options\RegistrationOptionsInterface;

/**
 * Class Register
 * @package ZfcUser\Form
 */
class RegistrationForm extends Form
{
    /**
     * @var RegistrationOptionsInterface
     */
    protected $registrationOptions;

    /**
     * @param string|null                   $name
     * @param array                         $options
     * @param RegistrationOptionsInterface  $registrationOptions
     */
    public function __construct($name = null, $options = [], RegistrationOptionsInterface $registrationOptions)
    {
        $this->registrationOptions = $options;
        parent::__construct($name, $options);
    }

    public function init()
    {
        /*if ($this->registrationOptions->getEnableUsername()) {
            $this->add([
                'name' => 'username',
                'type' => 'Text',
                'options' => [
                    'label' => 'Username',
                ],
            ]);
        }*/

        $this->add([
            'name' => 'email',
            'type' => 'Email',
            'options' => [
                'label' => 'Email',
            ],
        ]);

        $this->add([
            'name' => 'password',
            'type' => 'Password',
            'options' => [
                'label' => 'Password',
            ],
        ]);

        $this->add([
            'name' => 'passwordVerify',
            'type' => 'Password',
            'options' => [
                'label' => 'Password Verify',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Button',
            'attributes' => [
                'type' => 'submit',
            ],
            'options' => [
                'label' => 'Register',
            ],
        ]);
    }
}
