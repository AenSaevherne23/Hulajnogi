<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odbiory extends Model
{
    use HasFactory;
    protected $table = 'odbiory';
    protected  $primaryKey = 'id';

    protected $fillable = ['hulajnoga_id', 'pracownik_id','wypozyczenie_id','koszt_wypozyczenia'];



    public function pracownik()
    {
        return $this->belongsTo(User::class, 'pracownik_id');
    }

    public function hulajnoga()
    {
        return $this->belongsTo(Hulajnogi::class, 'hulajnoga_id');
    }
    public function wypozyczenie()
    {
        return $this->belongsTo(Wypozyczenia::class,'wypozyczenia_id');
    }

}
