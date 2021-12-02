<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {

    use Notifiable;
    use SoftDeletes;

    public static $Occupation = [
        'Student' => "ছাত্র/ছাত্রী",
        "Service" => "চাকুরীজীবি",
        "Business" => "ব্যবসায়ী",
        "Others" => "অন‌্যান‌্য",
    ];
    public static $Gender = [
       'Male'=>"পুরুষ",
        'Female'=>"মহিলা", 
        'Others'=>"অন‌্যান‌্য"
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook_id', 'google_id', 'email_verified_at', 'remember_token', 'user_type', 'status', 'picture', 'password_reset_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDistrict() {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }

    public function getNationality() {
        return $this->belongsTo('App\Country', 'nationality', 'id');
    }

    public function getTemporaryExams() {
        $this->hasMany('App\TemporaryExam', 'user_id', 'id');
    }

}
