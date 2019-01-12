<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TVDict extends Model
{
    //Table Name
    protected $table = 'tvdict';
    //Primary Key
    protected $primaryKey = 'tvid';
    // Timestamps
    public $timestamps = false;

    public function tvdict(){
        return $this->belongsTo('App\TVSerie');
    }
}
