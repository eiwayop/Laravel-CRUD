<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku_model extends Model
{
    //
    public $table='buku_models';
    protected $fillable = ['judul', 'pengarang', 'kategori', 'tahunTerbit', 'penerbit'];
}
