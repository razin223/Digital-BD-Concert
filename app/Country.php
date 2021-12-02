<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name', 'bn', 'nationality', 'nationality_bn',
        'created_by', 'updated_by', 'deleted_by'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($Country) {
            $Country->getDivision->each->delete();
        });
    }

    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy() {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    public function deletedBy() {
        return $this->belongsTo('App\User', 'deleted_by', 'id');
    }

    public function getDivision() {
        return $this->hasMany('App\Division', 'country_id', 'id');
    }

}
