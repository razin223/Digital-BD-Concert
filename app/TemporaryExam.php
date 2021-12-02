<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemporaryExam extends Model {

    use SoftDeletes;

    protected $fillable = [
        'user_id', 'questions', 'started', 'exam_time', 'submitted', 'time_taken', 'answer_submitted', 'mark_obtained'
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

    public static function getVariable($Variable) {
        return decrypt(substr(env($Variable), 7));
    }

}
