<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        't_firstname',
        't_lastname',
        't_id',
        'u_name',
        'u_age',
        'status',
        'created_at',
        'updated_at',
    ];
}
