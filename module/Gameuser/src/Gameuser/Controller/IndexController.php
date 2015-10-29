<?php

namespace Gameuser\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Api\Client\ApiClient;
use Zend\Http\Request as Request;
use Zend\Validator\File\Size;
use Zend\Validator\File\IsImage;
use Gameuser\Forms\RegisterForm;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
//        die('function indexAction');
        $this->layout('layout/index');
    }

    public function registerAction()
    {
//        die('function register');
        $this->layout('layout/index');
        $viewData = array();
        $registerForm = new RegisterForm();
        $registerForm->setAttribute('action', $this->url()->fromRoute('gameuser-register'));	//指定跳转处理页面

        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $registerForm->setInputFilter(RegisterForm::getRegisterInputFilter());		//指定过虑器
            $registerForm->setData($data);												//设备数据
            if ($registerForm->isValid()) {												//过滤
                $files = $request->getFiles()->toArray();
                $data = $registerForm->getData();

                unset($data['repeat_password']);
                unset($data['csrf']);
                unset($data['register']);

                $response = ApiClient::registerGameuser($data);//////////////////////
//                print_r($data);
//                die('after apiclient');
                if ($response['result'] == true) {
                    $this->flashMessenger()->addMessage('Gameuser created!');
                    die('true');
//                    return $this->redirect()->toRoute('wall', array('username' => $data['username']));
                }
                else {
                    $this->flashMessenger()->addMessage('Gameuser created!');
                    die('false');
                }
            }
        }

        $viewData['registerForm'] = $registerForm;
        $viewData['dataddd']='adddd';

        return $viewData;
//        return;
    }
}