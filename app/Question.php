<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    protected $fillable = [
        'group', 'question', 'option_1', 'option_2', 'option_3', 'option_4', 'answer',
        'created_by', 'updated_by'
    ];

    

    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy() {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

}
