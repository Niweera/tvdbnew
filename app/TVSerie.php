<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TVSerie extends Model
{
    //Table Name
    protected $table = 'tvseries';
    //Primary Key
    public $primaryKey = 'tvid';
    // Timestamps
    public $timestamps = false;

    public function tvplace(){
        return $this->hasMany('App\Storedin','tvid');
    }
    public function tvlink(){
        return $this->hasOne('App\TVDict','tvid');
    }
}
