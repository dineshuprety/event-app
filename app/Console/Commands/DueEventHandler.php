<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DueEventHandler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Past date should automatically go to finished events';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /* This is the code that will be executed when the command is called. */
        $events = Event::where('status', 'upcoming')
            ->whereDate('end_date', '=', Carbon::today()->toDateString())->get();
        if ($events->isEmpty()) {
            $this->error('Invalid or non-existent event.');

            return 1;
        }

        $this->info('Updating past date events to finished events');
        foreach ($events as $event) {
            $event->update([
                'status' => 'finished',
            ]);
        }
        $this->info('Updated Success');
    }
}
