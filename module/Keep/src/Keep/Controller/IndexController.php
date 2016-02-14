<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Keep\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Navigation\Navigation;
use Zend\Navigation\Page\AbstractPage;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

use Api\Client\ApiClient;
use Keep\Forms\HeroaddForm;
use Keep\Forms\RaceaddForm;
use Keep\Forms\VocationaddForm;
use Keep\Forms\CampaddForm;
use Keep\Forms\SkilladdForm;
use Keep\Forms\StepaddForm;
use Keep\Entity\Hero;
use Keep\Entity\Race;
use Keep\Entity\Vocation;
use Keep\Entity\Camp;
use Keep\Entity\Skill;
use Keep\Entity\Step;


use Zend\Http\Request as Request;
use Zend\Validator\File\Size;
use Zend\Validator\File\IsImage;

class IndexController extends AbstractActionController
{
    public function heroaddAction()
    {
        $this->layout('layout/layout');
        $vocationnames = ApiClient::getVocationNames();
        $racenames = ApiClient::getRaceNames();
//        print_r($racenames);
//        die();
        $viewData = array();
        $heroaddForm = new HeroaddForm();
        $heroaddForm->setAttribute('action', $this->url()->fromRoute('keep-heroadd'));
        $request = $this->getRequest();

        $abc=array('1'=>'a','2'=>'b');
        $heroaddForm->get('gender')->setValueOptions($racenames);
//        $heroaddForm->get('gender')->add
//        die();
//        $heroaddForm->get


        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $heroaddForm->setInputFilter(Hero::getInputFilter());
            $heroaddForm->setData($data);

            if ($heroaddForm->isValid()) {
//                die('web heroadd isvalid');
                $files = $request->getFiles()->toArray();
                $data = $heroaddForm->getData();
//            print_r($data);
//            die();
                $response = ApiClient::addHero($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Hero created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
                    return $this->redirect()->toRoute('keep-herodisplay');
                }
            }
        }
        $viewData['heroaddForm'] = $heroaddForm;
        $viewData['vocationnames'] = $vocationnames;
        $viewData['racenames'] = $racenames;

        if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
        return $viewData;
    }

    public function raceaddAction()
    {
//        die('raceaddAction');
        $this->layout('layout/layout');
        $viewData = array();
        $raceaddForm = new raceaddForm();
        $raceaddForm->setAttribute('action', $this->url()->fromRoute('keep-raceadd'));
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $raceaddForm->setInputFilter(race::getInputFilter());
            $raceaddForm->setData($data);

            if ($raceaddForm->isValid()) {
                $files = $request->getFiles()->toArray();
                $data = $raceaddForm->getData();
                $response = ApiClient::addrace($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Race created!');
                    return $this->redirect()->toRoute('keep-racedisplay');
                }
            }
        }
        $viewData['raceaddForm'] = $raceaddForm;
        if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
        return $viewData;
    }
    
    public function campaddAction(){
//        die('campaddAction');
        $this->layout('layout/layout');
        $viewData = array();
        $campaddForm = new campaddForm();
        $campaddForm->setAttribute('action', $this->url()->fromRoute('keep-campadd'));
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $campaddForm->setInputFilter(camp::getInputFilter());
            $campaddForm->setData($data);
            if ($campaddForm->isValid()) {
                $files = $request->getFiles()->toArray();
                $data = $campaddForm->getData();
                $response = ApiClient::addcamp($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Camp created!');
                    return $this->redirect()->toRoute('keep-campdisplay');
                }
            }
        }
        $viewData['campaddForm'] = $campaddForm;
        if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
        return $viewData;
    }

    public function vocationaddAction(){
//        die('vocationaddAction');
        $this->layout('layout/layout');
        $viewData = array();
        $vocationaddForm = new vocationaddForm();
        $vocationaddForm->setAttribute('action', $this->url()->fromRoute('keep-vocationadd'));
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $vocationaddForm->setInputFilter(vocation::getInputFilter());
            $vocationaddForm->setData($data);

            if ($vocationaddForm->isValid()) {
                $files = $request->getFiles()->toArray();
                $data = $vocationaddForm->getData();
                $response = ApiClient::addvocation($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Vocation created!');
                    return $this->redirect()->toRoute('keep-vocationdisplay');
                }
            }
        }

        $viewData['vocationaddForm'] = $vocationaddForm;
        if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
        return $viewData;
    }

    public function stepaddAction(){
//        die('stepaddAction');
        $this->layout('layout/layout');
        $viewData = array();
        $stepaddForm = new stepaddForm();
        $stepaddForm->setAttribute('action', $this->url()->fromRoute('keep-stepadd'));
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $stepaddForm->setInputFilter(step::getInputFilter());
            $stepaddForm->setData($data);

            if ($stepaddForm->isValid()) {
                $files = $request->getFiles()->toArray();
                $data = $stepaddForm->getData();
                $response = ApiClient::addstep($data);
                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Step created!');
                    return $this->redirect()->toRoute('keep-stepdisplay');
                }
            }
        }

        $viewData['stepaddForm'] = $stepaddForm;
        if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
        return $viewData;
    }

    public function skilladdAction(){
//        die('skilladdAction');
        $this->layout('layout/layout');
        $viewData = array();
        $skilladdForm = new skilladdForm();
        $skilladdForm->setAttribute('action', $this->url()->fromRoute('keep-skilladd'));
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $skilladdForm->setInputFilter(skill::getInputFilter());
            $skilladdForm->setData($data);

            if ($skilladdForm->isValid()) {
                $files = $request->getFiles()->toArray();
                $data = $skilladdForm->getData();
                $response = ApiClient::addskill($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Skill created!');
                    return $this->redirect()->toRoute('keep-skilldisplay');                }
            }
        }
        $viewData['skilladdForm'] = $skilladdForm;
        if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
        return $viewData;
    }

    public function herodisplayAction()
    {
        $viewData = array();
        $this->layout('layout/layout');
        $allheros = array();
/*
        $herodisplayForm = new HerodisplayForm();
        $herodisplayForm->setAttribute('action', $this->url()->fromRoute('keep-herodisplay'));
*/
        $request = $this->getRequest();///////GET http://localhost.gameweb/keep/hero/

        if ($request->isGet()) {
            $response = ApiClient::displayHero();
            if ($response !== FALSE) {
                $hydrator = new ClassMethods();
                foreach($response as $r)
                {
                    $allheros[] = $hydrator->hydrate($r, new Hero());
//                    $allheros[$r['HeroID']] = $hydrator->hydrate($r, new Hero());
                }
/*                if ($currentFeedId === null && !empty($feeds)) {
                    $currentFeedId = reset($feeds)->getId();
                }
*/
            } else {
                $this->getResponse()->setStatusCode(404);
                return;
            }
        }

        $viewData['allheros'] = $allheros;
/*          if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
*/
        return $viewData;
    }
    
    public function racedisplayAction()
    {
        $viewData = array();
        $this->layout('layout/layout');
        $allraces = array();
        $request = $this->getRequest();///////GET http://localhost.gameweb/keep/race/

        if ($request->isGet()) {
            $response = ApiClient::displayRace();
            if ($response !== FALSE) {
                $hydrator = new ClassMethods();
                foreach($response as $r)
                {
                    $allraces[] = $hydrator->hydrate($r, new Race());
                }
            } else {
                $this->getResponse()->setStatusCode(404);
                return;
            }
        }
        $viewData['allraces'] = $allraces;
        return $viewData;
    }

    public function campdisplayAction()
    {
        $viewData = array();
        $this->layout('layout/layout');
        $allcamps = array();
        $request = $this->getRequest();///////GET http://localhost.gameweb/keep/camp/

        if ($request->isGet()) {
            $response = ApiClient::displayCamp();
            if ($response !== FALSE) {
                $hydrator = new ClassMethods();
                foreach($response as $r)
                {
                    $allcamps[] = $hydrator->hydrate($r, new Camp());
                }
            } else {
                $this->getResponse()->setStatusCode(404);
                return;
            }
        }
        $viewData['allcamps'] = $allcamps;
        return $viewData;
    }
    
    public function stepdisplayAction()
    {
        $viewData = array();
        $this->layout('layout/layout');
        $allsteps = array();
        $request = $this->getRequest();///////GET http://localhost.gameweb/keep/step/

        if ($request->isGet()) {
            $response = ApiClient::displayStep();
            if ($response !== FALSE) {
                $hydrator = new ClassMethods();
                foreach($response as $r)
                {
                    $allsteps[] = $hydrator->hydrate($r, new Step());
                }
            } else {
                $this->getResponse()->setStatusCode(404);
                return;
            }
        }
        $viewData['allsteps'] = $allsteps;
        return $viewData;
    }
    
    public function skilldisplayAction()
    {
        $viewData = array();
        $this->layout('layout/layout');
        $allskills = array();
        $request = $this->getRequest();///////GET http://localhost.gameweb/keep/skill/

        if ($request->isGet()) {
            $response = ApiClient::displaySkill();
            if ($response !== FALSE) {
                $hydrator = new ClassMethods();
                foreach($response as $r)
                {
                    $allskills[] = $hydrator->hydrate($r, new Skill());
                }
            } else {
                $this->getResponse()->setStatusCode(404);
                return;
            }
        }
        $viewData['allskills'] = $allskills;
        return $viewData;
    }
    
    public function vocationdisplayAction()
    {
        $viewData = array();
        $this->layout('layout/layout');
        $allvocations = array();
        $request = $this->getRequest();///////GET http://localhost.gameweb/keep/vocation/

        if ($request->isGet()) {
            $response = ApiClient::displayVocation();
            if ($response !== FALSE) {
                $hydrator = new ClassMethods();
                foreach($response as $r)
                {
                    $allvocations[] = $hydrator->hydrate($r, new Vocation());
                }
            } else {
                $this->getResponse()->setStatusCode(404);
                return;
            }
        }
        $viewData['allvocations'] = $allvocations;
        return $viewData;
    }
    
    public function indexAction()
    {
        die('function indexaction');
/*        $this->layout('layout/signup');
        
        $viewData = array();
        $signupForm = new SignupForm();
        $signupForm->setAttribute('action', $this->url()->fromRoute('users-signup'));
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            
            $signupForm->setInputFilter(User::getInputFilter());
            $signupForm->setData($data);
            
            if ($signupForm->isValid()) {
                $files = $request->getFiles()->toArray();
                $data = $signupForm->getData();
                $data['avatar'] = $files['avatar']['name'] != '' ? $files['avatar']['name'] : null;
                
                if ($data['avatar'] !== null) {
                    $size = new Size(array('max' => 2048000));
                    $isImage = new IsImage();
                    $filename = $data['avatar'];
                    
                    $adapter = new \Zend\File\Transfer\Adapter\Http();
                    $adapter->setValidators(array($size, $isImage), $filename);
                    
                    if (!$adapter->isValid($filename)){
                        $errors = array();
                        foreach($adapter->getMessages() as $key => $row) {
                            $errors[] = $row;
                        }
                        $signupForm->setMessages(array('avatar' => $errors));
                    }
                    
                    $destPath = 'data/tmp/';
                    $adapter->setDestination($destPath);
                    
                    $fileinfo = $adapter->getFileInfo();
                    preg_match('/.+\/(.+)/', $fileinfo['avatar']['type'], $matches);
                    $newFilename = sprintf('%s.%s', sha1(uniqid(time(), true)), $matches[1]);
                    
                    $adapter->addFilter('File\Rename',
                        array(
                            'target' => $destPath . $newFilename,
                            'overwrite' => true,
                        )
                    );
                    
                    if ($adapter->receive($filename)) {
                        $data['avatar'] = base64_encode(
                            file_get_contents(
                                $destPath . $newFilename
                            )
                        );
                        
                        if (file_exists($destPath . $newFilename)) {
                            unlink($destPath . $newFilename);
                        }
                    }
                }
                
                unset($data['repeat_password']);
                unset($data['csrf']);
                unset($data['register']);
                
                $response = ApiClient::registerUser($data);
                
                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Account created!');
                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
                }
            }
        }

        $viewData['signupForm'] = $signupForm;
        return $viewData;
*/    }
}