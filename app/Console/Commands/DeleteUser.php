<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

/**
 * Usage:
 *   php artisan user:delete {id} [--force]
 *
 * Examples:
 *   php artisan user:delete 5
 *   php artisan user:delete 5 --force
 */
class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete {id : The ID of the user to delete} {--force : Delete without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a user by ID';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('id');
        
        $user = User::find($userId);

        if (! $user) {
            // fail() outputs an error message and immediately stops execution with exit code 1 (exit code 1 signals to the system or scripts that the command failed)
            // This is similar in effect to calling error() and then returning 1
            $this->fail("User with ID {$userId} not found.");
        }

        // a single blank line
        $this->newLine();

        // plain, uncolored text
        $this->line('User details:');

        // Table
        $this->table(
            // Columns in table:
            ['ID', 'Name', 'Email'],
            // Rows in table:
            [
                [$user->id, $user->name, $user->email], // 1st row in table
            ]
        );

        // If the `--force` option is NOT provided, we ask the user for confirmation
        if (! $this->option('force')) {
            $this->newLine();

            // warn() draws attention to destructive actions
            $this->warn('This action will permanently delete the user.');

            // confirm() prompts the user with a yes/no question and returns true only if the user confirms
            if (! $this->confirm("Are you sure you want to delete user #{$userId} ?")) {
                // The user chose not to continue, this is not considered an error. comment() is used for neutral informational messages (neither success nor error)
                $this->comment('Operation cancelled.');
    
                $this->newLine();
    
                // exit code 0 signals successful, normal termination of the command
                return 0;
            }
        }

        $user->delete();

        // info() is used to indicate a successful operation
        $this->info("User with ID {$userId} has been deleted.");

        $this->newLine();

        return 0;
    }
}
