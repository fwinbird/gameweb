<?php

namespace Home\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Api\Client\ApiClient;
/*
use Home\Forms\HeroaddForm;
use Home\Forms\RaceaddForm;
use Home\Forms\VocationaddForm;
use Home\Forms\CampaddForm;
use Home\Forms\SkilladdForm;
use Home\Forms\StepaddForm;
use Home\Entity\Hero;
use Home\Entity\Race;
use Home\Entity\Vocation;
use Home\Entity\Camp;
use Home\Entity\Skill;
use Home\Entity\Step;
*/
use Zend\Http\Request as Request;
use Zend\Validator\File\Size;
use Zend\Validator\File\IsImage;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        die('indexAction');
//        return new ViewModel();
    }
}