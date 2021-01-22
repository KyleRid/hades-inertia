<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $primaryKey = 'option_id';
    public $timestamps = false;
    protected $fillable = ['option_name'];
}
