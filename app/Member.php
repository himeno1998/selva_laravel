<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name_sei',
        'name_mei',
        'nickname',
        'gender',
        'password',
        'email',

        ];

}
