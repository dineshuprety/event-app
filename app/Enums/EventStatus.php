<?php

namespace App\Enums;

enum EventStatus: string
{
    case upcomingEvent = 'upcoming';
    case finishedEvent = 'finished';
    case upcomingWith7days = 'upcomingwith7days';
    case finishedWith7days = 'finishedwith7days';
}
