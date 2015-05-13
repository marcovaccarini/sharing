<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Casehistory extends Model {

    protected $fillable = [
        'customer_id',
        'titolo',
        'slug',
        'cliente',
        'brand',
        'categoria',
        'esigenza',
        'soluzione'
    ];

    /**
     * A case history can have many pictures.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pictures(){
        return $this->hasMany('App\Picture');

    }

}
