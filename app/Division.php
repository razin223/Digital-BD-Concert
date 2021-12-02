<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name', 'bn', 'country_id',
        'created_by', 'updated_by', 'deleted_by'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($Division) {
            $Division->getDistrict->each->delete();
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

    public function getDistrict() {
        return $this->hasMany('App\District', 'division_id', 'id');
    }

    public function getCountry() {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

}
