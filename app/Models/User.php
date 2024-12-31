<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Specify the table name
    protected $table = 'user';

    // Specify the primary key
    protected $primaryKey = 'id_user';

    // Set to false if the primary key is not auto-incrementing
    // public $incrementing = true;

    // Specify the primary key type
    // protected $keyType = 'int';

    // Define fillable attributes
    protected $fillable = [
        'user_name',
        'user_password',
        'user_level',
    ];

    // Hide sensitive attributes
    protected $hidden = [
        'user_password',
    ];

    // Cast attributes to specific types
    // protected $casts = [
    //     'user_level' => 'integer',
    // ];

    public function setUserPasswordAttribute($value)
    {
        $this->attributes['user_password'] = bcrypt($value);
    }

    public function logs()
    {
        return $this->hasMany(Logs::class, 'id_logs');
    }

}
