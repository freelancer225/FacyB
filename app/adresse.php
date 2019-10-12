<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adresse extends Model
{
    protected $table='adresse';
    public function User(){
        return $this->belongsTo('App\User', 'userid');
      }
}
