<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id', 'name', 'phone', 'address', 'city', 'state', 'zip', 'country'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
