<?php
/**
 * Created by PhpStorm.
 * User: ZGK
 * Date: 2015/9/15
 * Time: 16:06
 */
namespace Keep\Forms;

use Zend\Form\Element;
use Zend\Form\Form;

class SkilladdForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('keep-skilladd');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'well form-horizontal');

        $this->add(array(
            'name' => 'skillname',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'SkillName',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'textcn',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'TextCN',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));

        $this->add(array(
            'name' => 'addskill',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'AddSkill',
                'class' => 'btn btn-primary'
            ),
        ));
    }
}