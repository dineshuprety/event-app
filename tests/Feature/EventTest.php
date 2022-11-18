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
    Event::insert([
        [
            
            'title' => 'Task Submit',
            'description' => 'testing testcase',
            'start_date' => '2022-11-17',
            'end_date' => '2022-11-19',
        ],
        [
            
            'title' => 'Task Submit end',
            'description' => 'testing testcase end',
            'start_date' => '2022-11-18',
            'end_date' => '2022-11-20',
        ],
    ]);
    $this->get(route('index'))
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Event/Index')
                ->has('events.data', 2)
                ->has(
                    'events.data.0',
                    fn (Assert $assert) => $assert
                        ->where('id', '1')
                        ->where('title','testing testcase')
                        ->where('start_date', '2022-11-17')
                        ->where('end_date','2022-11-19')
                        
                )
                ->has(
                    'events.data.1',
                    fn (Assert $assert) => $assert
                        ->where('id', '2')
                        ->where('title','Task Submit end')
                        ->where('start_date',' testing testcase end')
                        ->where('end_date', '2022-11-20')
                        
                )
        );
});
