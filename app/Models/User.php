<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForNexmo($notification)
    {
        //return $this->phone_number; //assuming the user will have their phone number stored in DB

        return ''; //add USER number
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'conversation_id');
    }


    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


    public function roles()
    {

        return $this->belongsToMany(Role::class)->withTimestamps();
    }


    public function assignRole($role)
    {
        // $this->roles()->save($role);

        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }


        $this->roles()->sync($role, false); //will replace all of the existing records in the pivot table 
        //with this collection and anything that is not included in this collection but is in the DB, will be 
        //dropped, used false here for not dropping

        //will add any new records if necessary but it won't drop anything
    }


    public function abilities()
    { //not an eloquent relationship, need to call like a standard method
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }
}

//$user->roles

//$user->roles()->save($role)

//$user->assignRole()
