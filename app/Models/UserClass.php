<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClass extends Model
{
    /** @use HasFactory<\Database\Factories\UserClassFactory> */
    use HasFactory;
    protected $guarded = [];
}
