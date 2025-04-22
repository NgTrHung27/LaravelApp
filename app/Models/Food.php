<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    //class name and table name maybe different !
    protected $table = 'food';
    protected $primaryKey = 'id';
    public $timestamps = true; 
    protected $dateFormat = 'h:m:s';
}
