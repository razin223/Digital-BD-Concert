<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model {

    use SoftDeletes;

    protected $fillable = [
        'user_id', 'questions', 'started', 'started_micro', 'exam_time', 'exam_end_at', 'submitted', 'submitted_micro', 'time_taken', 'answer_submitted', 'mark_obtained'
    ];

//    public static function boot() {
//        parent::boot();
//
//        static::deleting(function($subCategory) {
//            $subCategory->getContent->each->delete();
//        });
//    }

    public function getUser() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
