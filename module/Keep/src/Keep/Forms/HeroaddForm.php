<?php
namespace Keep\Forms;

use Zend\Form\Element;
use Zend\Form\Form;

class HeroaddForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('keep-heroadd');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'well form-horizontal');
        
/*        $this->add(array(
            'name' => 'heroid',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'HeroId',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
*/        $this->add(array(
            'name' => 'heroname',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'HeroName',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'vocationname',
            'type'  => 'Zend\Form\Element\Radio',
            'options' => array(
                'label' => 'VocationName',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'raceid',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'RaceId',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'gender',
            'type'  => 'Zend\Form\Element\MultiCheckbox',
            'options' => array(
                'label' => 'Gender',
                'label_attributes' => array(
                    'class' => 'radio'
                ),
               'value_options' => array(
                    0 => '女人'
//                    1 => '男人'
                )
            )
        ));
        $this->add(array(
            'name' => 'addhero',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'AddHero',
                'class' => 'btn btn-primary'
            ),
        ));
        /*
        $this->add(array(
            'name' => 'avatar',
            'type'  => 'Zend\Form\Element\File',
            'options' => array(
                'label' => 'Avatar',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'name',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Name',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'surname',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Surname',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'bio',
            'type'  => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Bio',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'location',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Location',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(new Element\Csrf('csrf'));
        $this->add(array(
            'name' => 'register',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Register',
                'class' => 'btn btn-primary'
            ),
        ));
        */
    }
}