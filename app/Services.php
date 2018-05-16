<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'services';
    
    protected $fillable = [
          'name',
          'nameRus',
          'photo',
          'price',
          'display'
    ];
    
    public static $display = ["show" => "show", "hide" => "hide"];


    public static function boot()
    {
        parent::boot();

        Services::observe(new UserActionsObserver);
    }
    
    public function descriptions()
    {
        return $this->hasMany('App\DescriptionServices');
    }

    public function photos()
    {
        return $this->hasMany('App\PhotoServices');
    }
    
}