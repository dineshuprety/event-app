<?php

namespace App\Enums;

enum EventStatus: string
{
    case upcomingEvent = 'upcoming';
    case finishedEvent = 'finished';
}
