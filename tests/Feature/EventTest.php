<?php

namespace Tests\Feature;

use App\Models\Event;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

it('can render the dashboard page', function () {
    $this->get('/')
        ->assertSee('Dashboard')
        ->assertStatus(200);
});

it('can render the event index page', function () {

    $this->get('event/index')
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Event/Index')
                ->has('events.data')

        );
});


it('can automatically update past date to finished', function () {
    // needs to seed data
    $this->seed();

    // call the artisan command to update the status
    $this->artisan('event:update');

    // checking if event has been updated or not
    $event = Event::where('status', 'finished')->count();

    expect($event)->toBe($event);
});

it('can delete the event', function () {

    // create the data with factory
    $event = Event::factory()->create();
    // redirect to event index page
    $this
        ->get('/event/index')
        ->assertInertia(
            fn (Assert $assert) => $assert
                ->component('Event/Index')
                ->has('events')
                ->where('events.data.0.title', $event->title)
        );
    // delete the event
    expect($event->delete())->toBe(true);
});
