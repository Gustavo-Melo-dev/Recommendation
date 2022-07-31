<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $table = "recommendation";

    protected $fillable = [
        'name',
        'cpf',
        'telephone',
        'email'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
