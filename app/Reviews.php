<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Reviews extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'reviews';
    
    protected $fillable = [
          'name',
          'nameRus',
          'description',
          'descriptionRus',
          'display',
          'photo'
    ];
    
    public static $display = ["show" => "show", "hide" => "hide"];


    public static function boot()
    {
        parent::boot();

        Reviews::observe(new UserActionsObserver);
    }
    
    
    
    
}