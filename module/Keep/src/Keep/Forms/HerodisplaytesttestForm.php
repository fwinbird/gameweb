<?php
/**
 * Created by PhpStorm.
 * User: ZGK
 * Date: 2015/9/22
 * Time: 20:02
 */
namespace Keep\Forms;

use Zend\Form\Element;
use Zend\Form\Form;

class HerodisplayForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('keep-herodisplay');
//        die('die hero display construct');
//        $this->setAttribute('method', 'post');
//        $this->setAttribute('method', 'getlist');
        $this->setAttribute('class', 'well form-horizontal');
//        die('die hero display construct');
        $this->add(array(
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
            'name' => 'vocationid',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'VocationId',
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
            'type'  => 'Zend\Form\Element\Radio',
            'options' => array(
                'label' => 'Gender',
                'label_attributes' => array(
                    'class' => 'radio'
                ),
                'value_options' => array(
                    0 => 'Female',
                    1 => 'Male'
                )
            )
        ));
    }
}