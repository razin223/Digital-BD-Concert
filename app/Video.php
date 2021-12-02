<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model {

    use SoftDeletes;

    protected $fillable = [
        'title', 'link', 'display', 'display_order', 'featured',
        'created_by', 'updated_by', 'deleted_by'
    ];

    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy() {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    public function deletedBy() {
        return $this->belongsTo('App\User', 'deleted_by', 'id');
    }

}
