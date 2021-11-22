<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
  use HasFactory;

  public function adotante()
  {
    return $this->belongsTo(Adotante::class);
  }
  public function vacinacao()
  {
    return $this->hasMany(Vacinacao::class);
  }
}
