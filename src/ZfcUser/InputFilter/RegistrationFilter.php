<?php
namespace ZfcUser\InputFilter;

use Zend\InputFilter\InputFilter;
use ZfcUser\Options\RegistrationOptionsInterface;

/**
 * Class RegistrationFilter
 * @package ZfcUser\InputFilter
 */
class RegistrationFilter extends InputFilter
{
    /**
     * @var RegistrationOptionsInterface
     */
    protected $registrationOptions;

    /**
     * @param RegistrationOptionsInterface $registrationOptions
     */
    public function __construct(RegistrationOptionsInterface $registrationOptions)
    {
        $this->registrationOptions = $registrationOptions;
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        if ($this->registrationOptions->getEnableUsername()) {
            $this->add([
                'name' => 'username',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        // TODO: Make min/max configurable
                        'options' => [
                            'min' => 3,
                            'max' => 255,
                        ],
                    ],
                    /*[
                        'name' => 'ZfcUser\Validator\NoRecordExistsValidator',
                        'options' => [
                            'key' => 'username',
                        ],
                    ],*/
                ],
            ]);
        }

        $this->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim',
                ],
            ],
            'validators' => [
                [
                    'name' => 'EmailAddress',
                ],
                /*[
                    'name' => 'ZfcUser\Validator\NoRecordExistsValidator',
                    'options' => [
                        'key' => 'email',
                    ],
                ],*/
            ],
        ]);

        /*
        if ($this->getOptions()->getEnableDisplayName()) {
            $this->add(array(
                'name'       => 'display_name',
                'required'   => true,
                'filters'    => array(array('name' => 'StringTrim')),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'min' => 3,
                            'max' => 128,
                        ),
                    ),
                ),
            ));
        }
        */

        $this->add([
            'name' => 'password',
            'require' => true,
            'filters' => [
                [
                    'name' => 'StringTrim',
                ],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    // TODO: Make min configurable
                    'options' => [
                        'min' => 6,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'passwordVerify',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim',
                ],
            ],
            'validators' => [
                [
                    'name' => 'Identical',
                    'options' => [
                        'token' => 'password',
                    ],
                ],
            ],
        ]);
    }
}
