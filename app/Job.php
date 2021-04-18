<?php
//Charles and Katie
///CLC 256
/// Professor Hughes
/// This is our own work
namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'pay_range',
        'company',
        'employment'
    ];
}
