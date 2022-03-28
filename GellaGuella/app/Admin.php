<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable{

    use Notifiable;
    
    protected $table = 'admins';

    protected $fillable = [
        'name', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // function getAuthPassword(){
    //     return $this->password;
    // }

}