<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storedin extends Model
{
    //Table Name
    protected $table = 'storedin';
    //Primary Key
    protected $primaryKey = 'tvid';
    // Timestamps
    public $timestamps = false;

    public function tvname(){
        return $this->belongsTo('App\TVSerie','tvid');
    }
}
