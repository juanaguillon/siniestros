<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected  $fillable  = array(
        "user_rol",
        "user_name",
        "user_password",
        "user_email",
    );
    public $table = "sins_users";
    public $primaryKey = "user_id";
    const CREATED_AT = "user_created";
    const UPDATED_AT = "user_updated";
}
