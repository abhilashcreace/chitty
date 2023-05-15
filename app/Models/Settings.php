<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'default_password',
        'email',
        'phone1',
        'phone2',
        'mobile',
        'address',
        'copyright_content',
        'logo',
        'default_image',
        'fav_icon',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'status',
    ];
}