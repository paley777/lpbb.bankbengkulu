<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Gate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_login';
    use HasFactory;
    protected $guarded = ['id'];
}
