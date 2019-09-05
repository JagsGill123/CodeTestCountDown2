<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CountDown
 * @mixin \Eloquent
 * @package App
 */
class CountDown extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'startDate',
        'endDate',
    ];

    //
    protected $fillable = [
        'name',
        'content',
        'url',
        'startDate',
        'endDate',
        'priority',
    ];
}
