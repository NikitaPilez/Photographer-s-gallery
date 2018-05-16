<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class DescriptionServices extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'descriptionservices';
    
    protected $fillable = [
          'services_id',
          'description',
          'descriptionRus'
    ];
    

    public static function boot()
    {
        parent::boot();

        DescriptionServices::observe(new UserActionsObserver);
    }
    
    public function services()
    {
        return $this->hasOne('App\Services', 'id', 'services_id');
    }


    
    
    
}