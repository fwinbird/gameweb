<?php
/**
 * Created by PhpStorm.
 * User: zgk
 * Date: 2015/9/14
 * Time: 22:18
 */
namespace Keep\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;


class Camp
{
    const GENDER_MALE = 1;

    protected $campid;
    protected $campname;
    protected $textcn;
    protected $createdAt = null;
    protected $updatedAt = null;

    public function setCampID($campid)
    {
        $this->campid = (int)$campid;
    }

    public function setCampName($campname)
    {
        $this->campname = $campname;
    }

    public function setTextCN($textcn)
    {
        $this->textcn = $textcn;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime($createdAt);
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime($updatedAt);
    }

    public function getCampID()
    {
        return  $this->campid;
    }

    public function getCampName()
    {
        return $this->campname;
    }

    public function getTextCN()
    {
        return $this->textcn;
    }


    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Return the configuration of the validators and filters for this form
     *
     * @return InputFilter
     */

    public static function getInputFilter()
    {
        $inputFilter = new InputFilter();
        $factory = new InputFactory();

        $inputFilter->add($factory->createInput(array(
            'name' => 'campname',
            'required' => true,
            'filters' => array(
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
                        'min' => 1,
                        'max' => 50
                    ),
                ),
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name' => 'textcn',
            'required' => true,
            'filters' => array(
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
                        'min' => 1,
                        'max' => 50
                    ),
                ),
            ),
        )));

        return $inputFilter;
    }
}