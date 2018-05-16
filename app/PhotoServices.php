<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoServices extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'photoservices';
    
    protected $fillable = [
          'services_id',
          'photo'
    ];
    

    public static function boot()
    {
        parent::boot();

        PhotoServices::observe(new UserActionsObserver);
    }
    
    public function services()
    {
        return $this->hasOne('App\Services', 'id', 'services_id');
    }     
    
}