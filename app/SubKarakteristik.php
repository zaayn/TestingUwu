<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SubKarakteristik extends Model
{
    //
    use Notifiable;
    protected $table = 'subkarakteristik';
    protected $primaryKey = 'sk_id';

    public $timestamps = false;
    
    protected $fillable = [
        'sk_nama', 'bobot_relatif',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	public function karakteristik()
    {
        return $this->belongsTo(\App\Karakteristik::class,'k_id');
    }

}
