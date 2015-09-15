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

class VocationaddForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('keep-vocationadd');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'well form-horizontal');

        $this->add(array(
            'name' => 'vocationname',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'VocationName',
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
            'name' => 'addvocation',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'AddVocation',
                'class' => 'btn btn-primary'
            ),
        ));
    }
}