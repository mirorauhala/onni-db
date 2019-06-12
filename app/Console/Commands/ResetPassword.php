<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class ResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onni:reset {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Force reset password for a given user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::where('username', '=', $this->argument('username'))->first();

        if (empty($user)) {
            $this->error('User not found.');
            exit();
        }

        $this->line('This action will forcefully change the password. This action cannot be undone.');

        if ($this->confirm('Do you wish to continue?')) {
            $random = bin2hex(random_bytes(8));

            $user->update([
                'password' => bcrypt($random)
            ]);

            $user->save();

            $this->line('New password set to: '. $random);
        }
    }
}
