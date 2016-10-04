<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    /**
     * Create a relationship with Statistic model
     */
    public function Server()
    {
        return $this->belongsTo('App\Server');
    }
    public function deleteStats($serverId)
    {
        return $this->where('server_id', '=', $serverId)->delete();
    }
    public function getServerStatistics($serverId,$limit=null)
    {
        if($limit)
            $stats = $this->where('server_id', '=',$serverId)->orderBy('date', 'desc')->limit($limit)->get();
        else 
            $stats = $this->where('server_id', '=', $serverId)->orderBy('date', 'desc')->get();
        return $stats->toArray();
    }
    public function getServerStatisticsHighest($serverId)
    {
        return $this->where('server_id', '=', $serverId)->max('statvalue');
    }
    public function getServerStatisticsLowest($serverId)
    {
        return $this->where('server_id', '=', $serverId)->min('statvalue');
    }
     public function getServerStatisticsAverage($serverId)
    {
        return $this->where('server_id', '=', $serverId)->avg('statvalue');
    }
    public function insertData($data)
    {        
        return  $this->insert($data);
    }
   
    
}