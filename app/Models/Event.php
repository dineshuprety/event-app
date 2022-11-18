<?php

namespace App\Models;

use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        return $query->orderBy('start_date', 'asc');
    }

    /**
     * Scopes for filter
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? null, function ($query, $status) { // this is for upcoming filters
            if ($status === EventStatus::upcomingEvent->value) {  // check if status is upcoming event
                $query->where('status', 'like', '%' . $status . '%');
            } elseif ($status === EventStatus::finishedEvent->value) { // check if status is finished event
                $query->where('status', 'like', '%' . $status . '%');
            } elseif ($status === EventStatus::upcomingWith7days->value) {  // check if status is upcoming event with in 7 days
                $query->where('status', EventStatus::upcomingEvent->value)
                    ->whereBetween('start_date', [Carbon::today()->toDateString(), Carbon::today()->addDay(7)->toDateString()]);
            } else { // check if status is finished event with in 7 days
                $query->where('status', EventStatus::finishedEvent->value)
                    ->whereBetween('end_date', [Carbon::today()->toDateString(), Carbon::today()->addDay(7)->toDateString()]);
            }
        });
    }
}
