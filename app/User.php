<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ic', 'age', 'phone_home', 'phone_mobile', 'marital_status', 
        'residence_period', 'address', 'postcode', 'city', 'state', 'verify_date_nazir', 'remarks_nazir', 
        'verify_date_headv', 'remarks_headv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin(){
        return $this->belongsTo('App\Admin');
    }
    
}
