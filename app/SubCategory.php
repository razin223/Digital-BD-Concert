<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model {
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'sub_category_name', 'sub_category_order', 'sub_category_image', 'display',
        'created_by', 'updated_by', 'deleted_by'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($subCategory) {
            $subCategory->getContent->each->delete();
        });
    }

    public function getCategory() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
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

    public function getContent() {
        return $this->hasMany('App\Content', 'sub_category_id', 'id');
    }

}
