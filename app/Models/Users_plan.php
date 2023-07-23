<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_plan extends Model
{
    use HasFactory;
    protected $table = 'users_plan';
    protected $primaryKey = 'id';
}
