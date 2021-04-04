<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function abilities()
    {

        return $this->belongsToMany(Ability::class)->withTimestamps();
    }


    public function users()
    {

        return $this->belongsToMany(User::class);
    }


    public function allowTo($ability)
    {
        // $this->abilities()->save($ability);

        if (is_string($ability)) {
            $ability = Ability::whereName($ability)->firstOrFail();
        }


        $this->abilities()->sync($ability, false);
    }
}

//$moderator - abilities
