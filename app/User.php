<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function mobiles() {
        return $this->hasMany(Mobile::class);
    }
}
