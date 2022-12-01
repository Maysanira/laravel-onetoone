<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'pengguna';

    memberitahukan tabel pengguna memiliki relasi 1 ke model telepon
    public function telepon()
    {
        return $this->hasOne('App\Telepon')
    }
}