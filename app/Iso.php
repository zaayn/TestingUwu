<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iso extends Model
{
    use Notifiable;
    protected $table = 'iso';
    protected $primaryKey = 'i_id';
    
    protected $fillable = [
        'a_id', 'k_id', 
    ];
    public function aplikasi()
    {
        return $this->hasMany(\App\Aplikasi::class);
    }
    public function karakteristik()
    {
        return $this->hasMany(\App\Karakteristik::class);
    }
}
