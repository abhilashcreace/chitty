<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchemeList extends Model
{
    use HasFactory;


    protected $table = 'scheme_list';

    protected $fillable = [
        'uuid',
        'scheme_id',
        'month',
        'subs',
        'cum',
        'status'
    ];
}