<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klienci extends Model
{
    use HasFactory;
    protected $table = 'klienci';
    protected  $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['Imie', 'Nazwisko', 'Telefon'];
    protected $dates = ['created_at', 'updated_at'];
}
