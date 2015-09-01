<?php

namespace Users\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
//use Wall\Entity\Link;
//use Wall\Entity\Image;
//use Wall\Entity\Status;

class Hero
{
    const GENDER_MALE = 1;
    
    protected $heroid;
    protected $heroname;
    protected $raceid;
    protected $vocationid;
    protected $gender;
    protected $createdAt = null;
    protected $updatedAt = null;

    public function setheroId($id)
    {
        $this->heroid = (int)$heroid;
    }

    public function setheroname($heroname)
    {
        $this->heroname = $heroname;
    }

    public function setvocationid($vocationid)
    {
        $this->vocationid = (int)$vocationid;
    }

    public function setracename($racename)
    {
        $this->racename = $racename;
    }

    public function setgender($gender)
    {
        $this->gender = (int)$gender;
    }
    public function setcreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime($createdAt);
    }

    public function setupdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime($updatedAt);
    }
/*    public function setFeed($feed)
    {
        $hydrator = new ClassMethods();
        
        foreach ($feed as $entry) {
            if (array_key_exists('status', $entry)) {
                $this->feed[] = $hydrator->hydrate($entry, new Status());
            } else if (array_key_exists('filename', $entry)) {
                $this->feed[] = $hydrator->hydrate($entry, new Image());
            } else if (array_key_exists('url', $entry)) {
                $this->feed[] = $hydrator->hydrate($entry, new Link());
            }
        }
    }

    public function setAvatar($avatar)
    {
        if (empty($avatar)) {
            $defaultImage = new Image();
            $defaultImage->setFilename('default.png');
            $this->avatar = $defaultImage;
        } else {
            $hydrator = new ClassMethods();
            $this->avatar = $hydrator->hydrate($avatar, new Image());
        }
    }
*/
    public function getheroId()
    {
       return  $this->heroid;
    }

    public function getheroname()
    {
        return $this->heroname;
    }

    public function getvocationid()
    {
        return $this->vocationid;
    }

    public function getraceid()
    {
        return $this->raceid;
    }

    public function getgender()
    {
        return $this->gender;
    }
    public function getcreatedAt()
    {
        return $this->createdAt;
    }

    public function getupdatedAt()
    {
        return $this->updatedAt;
    }
    
/*
    public function getAvatar()
    {
        return $this->avatar;
    }
    
    public function getGenderString()
    {
        return $this->gender == self::GENDER_MALE? 'Male' : 'Female';
    }
    
    public function getFeed()
    {
        return $this->feed;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
*/
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
            'name' => 'heroname',
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

        return $inputFilter;
    }
        /*    public static function getInputFilter()
            {
                $inputFilter = new InputFilter();
                $factory = new InputFactory();

                $inputFilter->add($factory->createInput(array(
                    'name'     => 'heroname',
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
                                'min' => 1,
                                'max' => 50
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
                    ),
                )));

                $inputFilter->add($factory->createInput(array(
                    'name'     => 'repeat_password',
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
                            'name' => 'Identical',
                            'options' => array(
                                'token' => 'password'
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
                            'break_chain_on_failure' => true
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
                    'name'     => 'surname',
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
                                'min' => 1,
                                'max' => 50
                            )
                        ),
                    ),
                )));

                $inputFilter->add($factory->createInput(array(
                    'name'     => 'bio',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
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

                return $inputFilter;
            }
            */
}