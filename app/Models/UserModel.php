<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserModel extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $fillable  = array(
        "user_rol",
        "user_name",
        "user_password",
        "user_email",
    );

    protected $hidden = array(
        "user_password"
    );

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            "user_id" => $this->getKey(),
            "user_rol" => $this->user_rol,
            "user_email" => $this->user_email
        ];
    }
    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public $table = "sins_users";
    public $primaryKey = "user_id";
    const CREATED_AT = "user_created";
    const UPDATED_AT = "user_updated";
}
