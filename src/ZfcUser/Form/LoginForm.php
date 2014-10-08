<?php
namespace ZfcUser\Form;

use Zend\Form\Element;
use Zend\Form\Form;

/**
 * Class LoginForm
 * @package ZfcUser\Form
 */
class LoginForm extends Form
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->add([
            'name' => 'identity',
            'type' => 'Email',
            'options' => [
                'label' => 'Identity',
            ]
        ]);

        $this->add([
            'name' => 'credential',
            'type' => 'Password',
            'options' => [
                'label' => 'Password',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Button',
            'attributes' => [
                'type' => 'submit',
            ],
            'options' => [
                'label' => 'Sign In',
            ],
        ]);
    }
}
