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
        $query->when($filters['status'] ?? null, function ($query, $upcoming) { // this is for upcoming filters
            $query->where('status', 'like', '%' . $upcoming . '%');
        })->when($filters['finished'] ?? null, function ($query, $finished) { // this is for finished filters
            $query->where('status', 'like', '%' . $finished . '%');
        })->when($filters['upcomingwith7days'] ?? null, function ($query, $upcomingwith7days) { // filter start with now date to +7 days
            if ($upcomingwith7days) {
                $query->where('status', EventStatus::upcomingEvent)
                    ->whereBetween('start_date', [Carbon::today()->toDateString(), Carbon::today()->addDay(7)->toDateString()]);
            }
        })->when($filters['finishedwith7days'] ?? null, function ($query, $finishedwith7days) { // with end date upto 7 days
            if ($finishedwith7days) {
                $query->where('status', EventStatus::finishedEvent)
                    ->whereBetween('end_date', [Carbon::today()->toDateString(), Carbon::today()->addDay(7)->toDateString()]);
            }
        });
    }
}
