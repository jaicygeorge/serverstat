<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    /**
     * Create a relationship with Statistic model
     */
    public function Statistics()
    {
        return $this->hasMany('App\Statistics');
    }
    
    public function getServer($serverName)
    {
        return self::where('server',$serverName)->first();
    }
     public static function getAllServers()
    {
        return self::all();
    }
    public function insert($serverName)
    {
        return $this->insertGetId(['server' =>$serverName]);
    }
}