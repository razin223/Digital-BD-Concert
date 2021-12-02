<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {

    use SoftDeletes;

    protected $fillable = [
        'category_name', 'category_order', 'category_image', 'category_image_resized', 'display',
        'created_by', 'updated_by', 'deleted_by'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($Category) {
            $Category->getContent->each->delete();
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

//    public function getSubCategory() {
//        return $this->hasMany('App\SubCategory', 'category_id', 'id');
//    }
    
    public function getContent() {
        return $this->hasMany('App\Content', 'category_id', 'id');
    }

}
