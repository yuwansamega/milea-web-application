<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'image',
        'nip',
        'nik',
        'status',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'religion',
        'email',
        'phone',
        'edu',
        'level',
        'position',
        'institute',
        'institute_addr',
        'institute_phone',
    ];
    
}