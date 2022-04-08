<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    public $table = 'persons';
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
    ];
}
