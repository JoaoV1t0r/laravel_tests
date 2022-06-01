<?php

namespace App\Console\Commands;

use App\Jobs\User\WelcomeNotificationJob;
use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\UserRegistered;
use App\Notifications\WelcomeNotification;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jobs = [];
        $this->withProgressBar(User::all(), function (User $user) {
            $jobs[] = new WelcomeNotificationJob($user);
        });
        Bus::batch($jobs);
    }
}
