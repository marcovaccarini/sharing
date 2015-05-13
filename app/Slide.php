<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

    protected $fillable = [
        'customer_id',
        'filename',
    ];

    /**
     * A slide is owned by a customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function customers(){
        return $this->belongsTo('App\Customer')->withTimestamps();
	}

}
