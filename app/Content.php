<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model {

    use SoftDeletes;

    protected $fillable = [
        'sub_category_id', 'type', 'title', 'content', 'display_order', 'cover_image', 'cover_image_resized', 'display', 'featured',
        'created_by', 'updated_by', 'deleted_by'
    ];

//    public function getSubCategory() {
//        return $this->belongsTo('App\SubCategory', 'sub_category_id', 'id');
//    }
    
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

}
