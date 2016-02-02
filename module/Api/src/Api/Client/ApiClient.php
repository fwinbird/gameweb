<?php

namespace Api\Client;

use Zend\Http\Client as Client;
use Zend\Http\Request as Request;
use Zend\Json\Decoder as JsonDecoder;
use Zend\Json\Json as Json;

/**
 * This client manages all the operations needed to interface with the
 * social network API
 *
 * @package default
 */
class ApiClient {

    protected static $client = null;

//    protected static $endpointHost ='http://api.card.shaguangyu.fr';
    protected static $endpointHost = 'http://localhost.gamehome';
    protected static $endpointAddHero = '/keep/hero/add/';
    protected static $endpointAddCamp = '/keep/camp/add/';
    protected static $endpointAddRace = '/keep/race/add/';
    protected static $endpointAddSkill = '/keep/skill/add/';
    protected static $endpointAddStep = '/keep/step/add/';
    protected static $endpointAddVocation = '/keep/vocation/add/';

    protected static $endpointDisplayHero = '/keep/hero/';
    protected static $endpointDisplayRace = '/keep/race/';
    protected static $endpointDisplayVocation = '/keep/vocation/';
    protected static $endpointDisplayStep = '/keep/step/';
    protected static $endpointDisplaySkill = '/keep/skill/';
    protected static $endpointDisplayCamp = '/keep/camp/';

    protected static $endpointRegGameuser = '/keep/gameuser/register/';
    protected static $endpointGetVocationNames = '/keep/vocation/getnames/';
    protected static $endpointGetRaceNames = '/keep/race/getnames/';

    protected static $endpointUserLogin = '/api/user/login/';

    public static function authenticate($postData)
    {
        $url = self::$endpointHost . sprintf(self::$endpointUserLogin, null);
        return self::doRequest($url,$postData,Request::METHOD_POST);
    }

    public static function getVocationNames()
    {
        $url = self::$endpointHost . sprintf(self::$endpointGetVocationNames, null);
        return self::doRequest($url,null);
    }
    public static function getRaceNames()
    {
        $url = self::$endpointHost . sprintf(self::$endpointGetRaceNames, null);
        return self::doRequest($url,null);
    }

    public static function registerGameuser($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointRegGameuser, $data);
        return self::doRequest($url,$data);
    }

    public static function addHero($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointAddHero, $data);
        return self::doRequest($url,$data);
    }
    
    public static function displayHero()
    {
         $url = self::$endpointHost . sprintf(self::$endpointDisplayHero, null );
        return self::doRequest($url,null,Request::METHOD_GET);
    }
    public static function displayRace()
    {
        $url = self::$endpointHost . sprintf(self::$endpointDisplayRace, null );
        return self::doRequest($url,null,Request::METHOD_GET);
    }
    public static function displayCamp()
    {
        $url = self::$endpointHost . sprintf(self::$endpointDisplayCamp, null );
        return self::doRequest($url,null,Request::METHOD_GET);
    }
    public static function displayStep()
    {
        $url = self::$endpointHost . sprintf(self::$endpointDisplayStep, null );
        return self::doRequest($url,null,Request::METHOD_GET);
    }
    public static function displaySkill()
    {
        $url = self::$endpointHost . sprintf(self::$endpointDisplaySkill, null );
        return self::doRequest($url,null,Request::METHOD_GET);
    }
    public static function displayVocation()
    {
        $url = self::$endpointHost . sprintf(self::$endpointDisplayVocation, null );
        return self::doRequest($url,null,Request::METHOD_GET);
    }

    public static function addCamp($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointAddCamp, $data);
        return self::doRequest($url,$data);
    }

    public static function addRace($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointAddRace, $data);
        return self::doRequest($url,$data);
    }
    
    public static function addStep($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointAddStep, $data);
        return self::doRequest($url,$data);
    }

    public static function addSkill($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointAddSkill, $data);
        return self::doRequest($url,$data);
    }

    public static function addVocation($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointAddVocation, $data);
        return self::doRequest($url,$data);
    }

    protected static function getClientInstance()
    {
        if (self::$client === null) {
            self::$client = new Client();
            self::$client->setEncType(Client::ENC_URLENCODED);
        }
        
        return self::$client;
    }
    
    protected static function doRequest($url, array $postData = null , $method = Request::METHOD_POST)
    {
//        die('die apiclient dorequest');
        $client = self::getClientInstance();
        $client->setUri($url);
        $client->setMethod($method);

        if ($postData !== null) {
            $client->setParameterPost($postData);
        }
        
        $response = $client->send();
//        print_r($response->getBody());
//        die('');
        if ($response->isSuccess()) {
            return JsonDecoder::decode($response->getBody(), Json::TYPE_ARRAY);
        } else {
            return FALSE;
        }

    }

}