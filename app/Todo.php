<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name', 'description', 'completed', 'pin_to_top', 'user_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function isCompleted()
  {
    return $this->completed;
  }

  public function markAsCompleted()
  {
    $this->completed = TRUE;
    $this->save();
    return $this;
  }

  public function markAsUncompleted()
  {
    $this->completed = FALSE;
    $this->save();
    return $this;
  }
}
