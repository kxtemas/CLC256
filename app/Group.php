<?php
//Charles and Katie
///CLC 256
/// Professor Hughes
/// This is our own work
namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];
   
}
