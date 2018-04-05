<?php
namespace Saadj55\LaravelPubg;
class Pubg {

    protected $access_token;
    protected $api_url;
    protected $region;
    protected $endpoint;

    public function __construct()
    {
        $this->access_token = config('pubg.access_token');
        $this->api_url = config('pubg.api_url');
        $this->setRegion();
    }
    public function request($params){
        if(isset($params['filters'])){
            $url = $this->api_url . $this->region . '/' . $params['entity'] . '?filter';
            foreach ($params['filters'] as $key => $value){
                $url .= '[' .$key. ']='.$value;
            }
        }elseif(isset($params['id'])){
            $url = $this->api_url . $this->region . '/' . $params['entity'] . '/' . $params['id'];
        }else{
            $url = $this->api_url . $this->region . '/' . $params['entity'];
        }
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->access_token, 'Accept: application/vnd.api+json'));
        $response = curl_exec($request);
        return json_decode($response);
    }
    public function setRegion($region = null){
        $this->region = $region == null ? config('pubg.region') : $region;
    }
    public function getPlayersByName($player_names){

        $player_names_csv = implode(',', $player_names);
        $params = [
            'entity'=>'players',
            'filters'=>[
                'playerNames' =>$player_names_csv,
            ],
        ];

        return $this->request($params);
    }
    public function getPlayersByIds($player_ids){
        $player_ids_csv = implode(',', $player_ids);
        $params = [
            'entity'=>'players',
            'filters'=>[
                'playerIds' =>$player_ids_csv,
            ],
        ];
        return $this->request($params);
    }
    public function getPlayerById($player_id){
        $params = [
            'entity'=>'players',
            'id'=>$player_id,
        ];
        return $this->request($params);
    }
    public function getMatchById($match_id){
        $params = [
            'entity'=>'matches',
            'id'=>$match_id
        ];
        return $this->request($params);
    }
    public function getStatus(){

    }
}