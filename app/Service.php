<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    protected $fillable = [
        'name',
        'slug',
        'excertp',
        'body'
    ];

    /**
     * Get the customers associated with the given service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers(){

        return $this->belongsToMany('App\Customer')->withTimestamps();

	}

}
