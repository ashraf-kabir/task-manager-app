<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    /**
     * @var false|mixed
     */
    public mixed $completed;
    public mixed $name;
    public mixed $description;
    public mixed $user_id;
    protected    $dates = ['deleted_at'];
}
