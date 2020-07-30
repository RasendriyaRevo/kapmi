<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginUser extends Authenticatable
{
    //
    protected $table = 'users';
}
