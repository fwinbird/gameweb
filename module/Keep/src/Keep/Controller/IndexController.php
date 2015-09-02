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
use Api\Client\ApiClient;
use Keep\Forms\HeroaddForm;
use Keep\Entity\Hero;

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
//                die('die function heroaddAction');
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

                $response = ApiClient::addHero($data);

                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Account created!');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
                }
            }
        }

        $viewData['heroaddForm'] = $heroaddForm;
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