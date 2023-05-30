<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placowki extends Model
{
    use HasFactory;

    protected $table = 'placowki';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['nazwa', 'adres'];
    protected $dates = ['created_at', 'updated_at'];

    public function hulajnogi()
    {
        return $this->belongsToMany(Hulajnogi::class, 'placowki_hulajnogi', 'placowka_id', 'hulajnoga_id');
    }
}
