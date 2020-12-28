<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class HasilKuesioner extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'hasilkuesioner';
    
    protected $fillable = [
        'hk_nilai',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function subkarakteristikaplikasi()
    {
        return $this->belongsTo(\App\SubKarakteristikAplikasi::class,'sa_id');
    }
}
