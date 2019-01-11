<?php
/**
 *  Laravel Package for PUBG API
 *
 *  Documentation : https://github.com/saadj55/laravel-pubg
 *
 *  Read the README, and the contributing guidelines to contribute to this project.
 *
 *  - Saad Nasir Siddique <saadj55@gmail.com> : https://github.com/saadj55
 */
namespace Saadj55\LaravelPubg;
use Saadj55\LaravelPubg\Exceptions\PubgException;

class Pubg {

    protected $access_token;
    protected $api_url;
    protected $region;
    protected $platform;
    const PLAYER_ENT = 'players';
    const MATCH_ENT = 'matches';

    public function __construct()
    {
        $this->access_token = config('pubg.access_token');
        $this->api_url = config('pubg.api_url');
        $this->setRegion();
        $this->setPlatform();
    }
    public function request($params){
        if(!isset($this->access_token) || empty($this->access_token)){
            throw new PubgException('Access token not found. Please set Access Token in the .env');
        }
        if(!isset($this->region) || empty($this->region)){
            throw new PubgException('Region not found. Please set Region in the .env');
        }
        if(!isset($this->platform) || empty($this->platform)){
            throw new PubgException('Platform not found. Please set Platform in the .env');
        }
        if(isset($params['filters'])){
            $url = $this->api_url . $this->region . '/' . $params['entity'] . '?filter';
            foreach ($params['filters'] as $key => $value){
                $url .= '[' .$key. ']='.$value;
            }
        }elseif(isset($params['id'])) {
            $url = $this->api_url . $this->region . '/' . $params['entity'] . '/' . $params['id'];
        }elseif(isset($params['entity']) && ($params['entity'] == self::PLAYER_ENT)){
            $url = $this->api_url . $this->platform . '/' . $params['entity'];
        }else{
            $url = $this->api_url . $this->region . '/' . $params['entity'];
        }
        return $this->dispatchCurlRequest($url);
    }
    public function dispatchCurlRequest($url, $params = null){
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->access_token, 'Accept: application/vnd.api+json'));
        $response = curl_exec($request);
        return json_decode($response);
    }

    public function setPlatform($platform = null){
        $this->platform = $platform == null ? config('pubg.platform') : $platform;
    }
    public function setRegion($region = null){
        $this->region = $region == null ? config('pubg.region') : $region;
    }
    public function getPlayersByName(array $player_names){

        $player_names_csv = implode(',', $player_names);
        $params = [
            'entity'=>$this::PLAYER_ENT,
            'filters'=>[
                'playerNames' =>$player_names_csv,
            ],
        ];

        return $this->request($params);
    }
    public function getPlayersByIds(array $player_ids){

        $player_ids_csv = implode(',', $player_ids);
        $params = [
            'entity'=>$this::PLAYER_ENT,
            'filters'=>[
                'playerIds' =>$player_ids_csv,
            ],
        ];
        return $this->request($params);
    }
    public function getPlayerById($player_id){
        $params = [
            'entity'=>$this::PLAYER_ENT,
            'id'=>$player_id,
        ];
        return $this->request($params);
    }
    public function getMatchById($match_id){
        $params = [
            'entity'=>$this::MATCH_ENT,
            'id'=>$match_id
        ];
        return $this->request($params);
    }
    public function getStatus(){
        $url = 'https://api.pubg.com/status';
        return $this->dispatchCurlRequest($url);
    }
}