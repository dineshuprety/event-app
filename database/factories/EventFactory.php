<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\EventStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'start_date'=> $this->faker->dateTimeInInterval('-1 week', '+20 days')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeInInterval('+1 week', '+20 days')->format('Y-m-d'),
            'status' => $this->faker->randomElement(
                [
                    EventStatus::upcomingEvent,
                ]
            )
        ];
    }
}
