<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'settings';
    
    protected $fillable = [
          'copyright',
          'vk',
          'instagram',
          'fivehundredpx',
          'youtube',
          'phone',
          'email'
    ];
    

    public static function boot()
    {
        parent::boot();

        Settings::observe(new UserActionsObserver);
    }
    
    
    
    
}