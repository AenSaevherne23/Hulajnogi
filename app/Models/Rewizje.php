<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewizje extends Model
{
    use HasFactory;
    protected $table = 'rewizje';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['Data', 'Czy_uszkodzona', 'Opis', 'Koszt_uszkodzen'];
    protected $dates = ['created_at', 'updated_at'];
}
