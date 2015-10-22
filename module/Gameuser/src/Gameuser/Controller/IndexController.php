<?php

namespace Gameuser\Controller;
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
        return $this->layout('layout/index');
    }
}