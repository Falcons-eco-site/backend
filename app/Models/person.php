<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class person extends Authenticatable
{
    public $table = 'persons';
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
    ];
}
