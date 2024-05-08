<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllSub extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'all_subs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'imdb',
        'date',
        'author_name',
        'author_id',
        'lang',
        'comment',
        'releases',
        'subscene_link',
        'fileLink',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'releases' => 'array', // Assuming 'releases' field stores JSON data
    ];
}
