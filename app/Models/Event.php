<?php

namespace App\Models;

use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status'
    ];

    /**
     * adding enum on cast.
     */
    protected $casts = [
        'status' => EventStatus::class
    ];

    /**
     * Scopes for sort by event start date in ascending order
     */

     public function scopeOrderByStartDate($query)
     {
        return $query->orderBy('start_date','asc');
     }

     /**
      * Scopes for filter
      */
      public function scopeFilter($query)
     {
        return $query;
     }
}
