<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telepon extends Model
{
    use hasfactory;
    protected $fillable = [
        
        'nomortelepon',
        'pengguna_id',
        
    ];
    protected $table = "telepon";

    
    // fungsi yang menjelaskan bahwa model telepon terhubung dengan model pengguna
    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna');
    }
}
