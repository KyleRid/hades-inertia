<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $primaryKey = 'config_id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'siteName',
        'siteDescription',
        'titleTag',
        'allowLogin',
        'allowRegistration',
        'maintenanceMode',
        'adminEmail'
    ];
}
