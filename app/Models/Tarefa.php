<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['descricao'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
