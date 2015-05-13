<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

	protected $fillable = [
        'casehistory_id',
        'filename'
    ];

    /**
     * An image is owned by a case history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function casehistories(){
        return $this->belongsTo('App\Casehistory')->withTimestamps();

    }

}
