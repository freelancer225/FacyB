<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filieres extends Model
{
   

    public function doms(){
        return $this->belongsTo('App\domains','dom_id');
        
    }
}
