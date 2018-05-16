<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Models extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'models';
    
    protected $fillable = [
          'name',
          'photo',
          'display'
    ];
    
    public static $display = ["show" => "show", "hide" => "hide"];


    public static function boot()
    {
        parent::boot();

        Models::observe(new UserActionsObserver);
    }
    
    
    
    
}