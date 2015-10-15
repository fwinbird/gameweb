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

use Keep\Forms\HerodisplayForm;

use Zend\Http\Request as Request;
use Zend\Validator\File\Size;
use Zend\Validator\File\IsImage;

class IndexController extends AbstractActionController
{
    public function heroaddAction()
    {
        $this->layout('layout/heroadd');

        $viewData = array();
        $heroaddForm = new HeroaddForm();

        $heroaddForm->setAttribute('action', $this->url()->fromRoute('keep-heroadd'));

        $request = $this->getRequest();

//        print_r($request);
//        die('request');
        if ($request->isPost()) {

            $data = $request->getPost()->toArray();
            $heroaddForm->setInputFilter(Hero::getInputFilter());
            $heroaddForm->setData($data);


            if ($heroaddForm->isValid()) {
//                die('web heroadd isvalid');
                $files = $request->getFiles()->toArray();
                $data = $heroaddForm->getData();
/*
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
*/
//                unset($data['repeat_password']);
//                unset($data['csrf']);
//                unset($data['register']);
//            print_r($data);
//            die();
                $response = ApiClient::addHero($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Hero created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
                }
            }
        }

        $viewData['heroaddForm'] = $heroaddForm;
        if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
        return $viewData;

    }

    public function raceaddAction()
    {
//        die('raceaddAction');
        $this->layout('layout/raceadd');

        $viewData = array();
        $raceaddForm = new raceaddForm();
        $raceaddForm->setAttribute('action', $this->url()->fromRoute('keep-raceadd'));

        $request = $this->getRequest();
//        print_r($request);
//        die('request');
        if ($request->isPost()) {

            $data = $request->getPost()->toArray();
            $raceaddForm->setInputFilter(race::getInputFilter());
            $raceaddForm->setData($data);

            if ($raceaddForm->isValid()) {
//                die('web raceadd isvalid');
                $files = $request->getFiles()->toArray();
                $data = $raceaddForm->getData();
//            print_r($data);
//            die();
                $response = ApiClient::addrace($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Race created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
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
        $this->layout('layout/campadd');

        $viewData = array();
        $campaddForm = new campaddForm();
        $campaddForm->setAttribute('action', $this->url()->fromRoute('keep-campadd'));

        $request = $this->getRequest();
//        print_r($request);
//        die('request');
        if ($request->isPost()) {

            $data = $request->getPost()->toArray();
            $campaddForm->setInputFilter(camp::getInputFilter());
            $campaddForm->setData($data);

            if ($campaddForm->isValid()) {
//                die('web campadd isvalid');
                $files = $request->getFiles()->toArray();
                $data = $campaddForm->getData();
//            print_r($data);
//            die();
                $response = ApiClient::addcamp($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Camp created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
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
        $this->layout('layout/vocationadd');

        $viewData = array();
        $vocationaddForm = new vocationaddForm();
        $vocationaddForm->setAttribute('action', $this->url()->fromRoute('keep-vocationadd'));

        $request = $this->getRequest();
//        print_r($request);
//        die('request');
        if ($request->isPost()) {

            $data = $request->getPost()->toArray();
            $vocationaddForm->setInputFilter(vocation::getInputFilter());
            $vocationaddForm->setData($data);

            if ($vocationaddForm->isValid()) {
//                die('web vocationadd isvalid');
                $files = $request->getFiles()->toArray();
                $data = $vocationaddForm->getData();
//            print_r($data);
//            die();
                $response = ApiClient::addvocation($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Vocation created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
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
        $this->layout('layout/stepadd');

        $viewData = array();
        $stepaddForm = new stepaddForm();
        $stepaddForm->setAttribute('action', $this->url()->fromRoute('keep-stepadd'));

        $request = $this->getRequest();
//        print_r($request);
//        die('request');
        if ($request->isPost()) {

            $data = $request->getPost()->toArray();
            $stepaddForm->setInputFilter(step::getInputFilter());
            $stepaddForm->setData($data);

            if ($stepaddForm->isValid()) {
//                die('web stepadd isvalid');
                $files = $request->getFiles()->toArray();
                $data = $stepaddForm->getData();
//            print_r($data);
//            die();
                $response = ApiClient::addstep($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Step created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
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
        $this->layout('layout/skilladd');

        $viewData = array();
        $skilladdForm = new skilladdForm();
        $skilladdForm->setAttribute('action', $this->url()->fromRoute('keep-skilladd'));

        $request = $this->getRequest();
//        print_r($request);
//        die('request');
        if ($request->isPost()) {

            $data = $request->getPost()->toArray();
            $skilladdForm->setInputFilter(skill::getInputFilter());
            $skilladdForm->setData($data);

            if ($skilladdForm->isValid()) {
//                die('web skilladd isvalid');
                $files = $request->getFiles()->toArray();
                $data = $skilladdForm->getData();
//            print_r($data);
//            die();
                $response = ApiClient::addskill($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Skill created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
                }
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
        $this->layout('layout/herodisplay');
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
                    $allheros[$r['HeroID']] = $hydrator->hydrate($r, new Hero());
                }
/*                if ($currentFeedId === null && !empty($feeds)) {
                    $currentFeedId = reset($feeds)->getId();
                }
*/
            } else {
                $this->getResponse()->setStatusCode(404);
                return;
            }

//            print_r( $response);
//            print_r($allheros);
//            die();
        }

        $viewData['allheros'] = $allheros;
/*          if($this->flashMessenger()-> hasMessages()){
            $viewData['flashMessages'] = $this->flashMessenger()->getMessages();
        }
*/
//        print_r($viewData['allheros'] );
//        die();
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