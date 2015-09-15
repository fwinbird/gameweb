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

class RaceaddForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('keep-raceadd');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'well form-horizontal');

        $this->add(array(
            'name' => 'racename',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'RaceName',
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
            'name' => 'addrace',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'AddRace',
                'class' => 'btn btn-primary'
            ),
        ));
    }
}