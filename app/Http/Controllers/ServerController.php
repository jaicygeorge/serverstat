<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Server as Server;
use App\Statistics as Statistics;
use GuzzleHttp\Client;

class ServerController extends Controller {

    const SEREVR_API = "http://www.sublimegroup.net/st4ts/data/get/type/servers/";
    const SEREVR_STAT_API = "http://www.sublimegroup.net/st4ts/data/get/type/iq/server/";

    public function servers() {
        $servers = Server::getAllServers();
        $this->populateDBData();
        return view('welcome', array("servers" => $servers));
    }
    
    public function statatics($server){
        $statObj = new Statistics();
        $statastics = $statObj->getServerStatistics($server);
        if($statastics)       
        {
            $high = $statObj->getServerStatisticsHighest ($server);
            $low = $statObj->getServerStatisticsLowest ($server);
            $avg = $statObj->getServerStatisticsAverage ($server);           
            echo json_encode(array('data'=>$statastics,'high'=>$high,'low'=>$low,'avg'=>$avg));
        }
        else return "noresult";   
        exit;
    }
//    private function prepareGrap

    private function populateDBData() {
        $servers = $this->getServerJson();
        try {
            if ($servers) {
                foreach ($servers as $server) {
                    $serverName = $server->s_system;
                    $server = new Server;
                    $result = $server->getServer($serverName);
                    if (empty($result)) {
                        $id = $server->insert($serverName);
                    } else
                        $id = $result->id;
                    $serverStatistics = $this->getStatisticsJson($serverName);
                    if (!empty($serverStatistics)) {
                        $serverStat = new Statistics;
                        $serverStat->deleteStats($id);
                        $valueArray = [];
                        foreach ($serverStatistics as $key => $val) {
                            $value = $val->data_value;
                            $date = $val->data_label;
                            $valueArray[] = array('statvalue' => $value, 'server_id' => $id, 'date' => $date);
                        }
                        $serverStat->insertData($valueArray);
                    }
                }
            }
        } catch (Exception $e) {
            var_dump($e);
            exit;
        }
    }

    private function getServerJson() {
        $servers = $this->getApiResult(self::SEREVR_API);
        if ($servers)
            return json_decode($servers);
        return array();
    }

    private function getStatisticsJson($server) {
        $serverStat = $this->getApiResult(self::SEREVR_STAT_API . $server);
        if ($serverStat)
            return json_decode($serverStat);
        return array();
    }

    private function getApiResult($url) {
        try {
            $client = new Client(['base_uri' => $url]);
            $response = $client->request('GET')->getBody()->getContents();
            return $response;
        } catch (Exception $e) {
            //need to log it
        }
    }

}
