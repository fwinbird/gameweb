<?php
namespace Gameuser\Forms;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class RegisterForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('gameuser-register');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'well form-horizontal');
        
        $this->add(array(
            'name' => 'username',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'UsernameUsernameUsername',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'email',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Email',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'password',
            'type'  => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Password',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            )
        ));
        $this->add(array(
            'name' => 'repeat_password',
            'type'  => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Repeat password',
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
            'name' => 'location',
            'type'  => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Location',
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
        
        $this->add(new Element\Csrf('csrf'));
        $this->add(array(
            'name' => 'register',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Register',
                'class' => 'btn btn-primary'
            ),
        ));
    }
    
    
    public static function getRegisterInputFilter()
    {
    	$inputFilter = new InputFilter();
    	$factory = new InputFactory();
//    die('die getregisterinputfilter');
    	$inputFilter->add($factory->createInput(array(
    			'name'     => 'username',
    			'required' => true,
    			'filters'  => array(
    					array('name' => 'StripTags'),
    					array('name' => 'StringTrim'),
    			),
    			'validators' => array(
    					array(
    							'name' => 'NotEmpty',
    							'break_chain_on_failure' => true
    					),
    					array(
    							'name' => 'StringLength',
    							'options' => array(
    									'encoding' => 'UTF-8',
    									'min' => 10,
    									'max' => 50
    
    							),
    					),
    
    			),
    	)));
    	
    
        
    	$inputFilter->add($factory->createInput(array(
    			'name'     => 'password',
    			'required' => true,
    			'filters'  => array(
    					array('name' => 'StripTags'),
    					array('name' => 'StringTrim'),
    			),
    			'validators' => array(
    					array(
    							'name' => 'NotEmpty',
    							'break_chain_on_failure' => true
    					),
    					array(
    							'name'    => 'StringLength',
    							'options' => array(
    									'encoding' => 'UTF-8',
    									'min' => 6,
    									'max' => 60,
    							),
    					),
    			),
    	)));
    	
    	$inputFilter->add($factory->createInput(array(
    			'name'     => 'email',
    			'required' => true,
    			'filters'  => array(
    					array('name' => 'StripTags'),
    					array('name' => 'StringTrim'),
    			),
   			
	            'validators' => array(
	                array(
	                    'name' => 'NotEmpty',
	                    'break_chain_on_failure' => true
	                ),
	                array(
	                    'name' => 'StringLength',
	                    'options' => array(
	                        'min' => 6,
	                        'max' => 254
	                    ),
	                    'break_chain_on_failure' => true
	                ),
	                array(
	                    'name' => 'EmailAddress',
	                    'options' => array(
	                        'messages' => array(
	                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'The input is not a valid email address',
	                        )
	                    )
	                ),
	            ),    			
    	)));

    	$inputFilter->add($factory->createInput(array(
    			'name'     => 'name',
    			'required' => true,
    			'filters'  => array(
    					array('name' => 'StripTags'),
    					array('name' => 'StringTrim'),
    			),
    			'validators' => array(
    					array(
    							'name' => 'NotEmpty',
    					),
    					array(
    							'name' => 'StringLength',
    							'options' => array(
    									'min' => 1,
    									'max' => 25
    							)
    					),
    			),
    	)));

    	
    	$inputFilter->add($factory->createInput(array(
    			'name'     => 'location',
    			'required' => false,
    			'filters'  => array(
    					array('name' => 'StripTags'),
    					array('name' => 'StringTrim'),
    			),
    	)));
    	
    	$inputFilter->add($factory->createInput(array(
    			'name'     => 'gender',
    			'required' => false,
    			'filters'  => array(
    					array('name' => 'StripTags'),
    					array('name' => 'StringTrim'),
    					array('name' => 'Int'),
    			),
    			'validators' => array(
    					array(
    							'name' => 'InArray',
    							'options' => array(
    									'haystack' => array('0', '1')
    							)
    					),
    			),
    	)));

    	return $inputFilter;		//返回过滤器
    	   
    }   
}