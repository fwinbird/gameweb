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

class StepaddForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('keep-stepadd');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'well form-horizontal');

        $this->add(array(
            'name' => 'stepname',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'StepName',
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
            'name' => 'addstep',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'AddStep',
                'class' => 'btn btn-primary'
            ),
        ));
    }
}