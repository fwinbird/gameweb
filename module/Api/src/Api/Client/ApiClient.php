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

//    protected static $endpointHost ='http://api.card.shaguangyu.fr/';
    protected static $endpointHost = 'http://localhost.gamehome';
    protected static $endpointAddHero = '/keep/hero/add';
    protected static $endpointAddCamp = '/keep/camp/add';
    protected static $endpointAddRace = '/keep/race/add';
    protected static $endpointAddSkill = '/keep/skill/add';
    protected static $endpointAddStep = '/keep/step/add';
    protected static $endpointAddVocation = '/keep/vocation/add';

    protected static $endpointDisplayHero = '/keep/hero/display';
/*
    protected static $endpointWall = '/api/wall/%s';
    protected static $endpointFeeds = '/api/feeds/%s';
    protected static $endpointSpecificFeed = '/api/feeds/%s/%d';
    protected static $endpointUsers = '/api/users';
    protected static $endpointGetUser = '/api/users/%s';
*/

    public static function addHero($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointAddHero, $data);
        return self::doRequest($url,$data);
    }

/*    public static function displayHero($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointDisplayHero, $data);
        return self::doRequest($url,$data);
    }
*/
    public static function displayHero($data)
    {
        $url = self::$endpointHost . sprintf(self::$endpointDisplayHero, $data);
        die($url);
        return self::doRequest($url);
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

    /**
     * Perform a request to the API
     *
     * @param string $url
     * @param array $postData
     * @param Client $client
     * @return Zend\Http\Response
     * @author Christopher
     */
    protected static function doRequest($url, array $postData , $method = Request::METHOD_POST)
    {
        die('die apiclient dorequest');
        $client = self::getClientInstance();
        $client->setUri($url);
        $client->setMethod($method);

        if ($postData !== null) {
            $client->setParameterPost($postData);
        }
        
        $response = $client->send();
        print_r($response->getBody());
        die('');
        if ($response->isSuccess()) {
            return JsonDecoder::decode($response->getBody(), Json::TYPE_ARRAY);
        } else {
            return FALSE;
        }

    }

}