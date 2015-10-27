<?php

namespace Home\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Api\Client\ApiClient;
use Zend\Http\Request as Request;
use Zend\Validator\File\Size;
use Zend\Validator\File\IsImage;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
//        die('indexAction');
//        return new ViewModel();
        $this->layout('layout/index');
    }
}