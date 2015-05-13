<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	protected $fillable = [
        'name',
        'logo',
        'description',
        'casehistory',
        'web'
    ];

    /**
     * Get the services associates that given customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    /**
     * A customer can have many slides.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function slides(){
        return $this->hasMany('App\Slide');
    }

    /**
     * Get a list of the services associates with the current customer.
     *
     * @return array
     */
    public function getServiceListAttribute(){

        return $this->services->lists('id');

    }



}
