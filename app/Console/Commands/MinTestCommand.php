<?php

namespace App\Console\Commands;

use App\Models\PublicProfile;
use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Console\Command;

class MinTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:min-test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /*
        $user = User::find('2');
        $this->info($user->hasRole("admin"));
        */
    }
}
