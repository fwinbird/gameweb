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


class Vocation
{
    const GENDER_MALE = 1;

    protected $vocationid;
    protected $vocationname;
    protected $textcn;
    protected $createdAt = null;
    protected $updatedAt = null;

    public function setvocationId($vocationid)
    {
        $this->vocationid = (int)$vocationid;
    }

    public function setvocationname($vocationname)
    {
        $this->vocationname = $vocationname;
    }

    public function settextcn($textcn)
    {
        $this->textcn = $textcn;
    }

    public function setcreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime($createdAt);
    }

    public function setupdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime($updatedAt);
    }

    public function getvocationId()
    {
        return  $this->vocationid;
    }

    public function getvocationname()
    {
        return $this->vocationname;
    }

    public function gettextcn()
    {
        return $this->textcn;
    }


    public function getcreatedAt()
    {
        return $this->createdAt;
    }

    public function getupdatedAt()
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
            'name' => 'vocationname',
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