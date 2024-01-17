<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailToUsers;
use App\Models\User;
class SendEmailToUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */


     protected $message;

    /**
     * Create a new job instance.
     *
     * @param  string  $message
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }



    /**
     * Execute the job.
     */
    public function handle()
    {
        $users = User::all(); // Retrieve the users you want to send emails to

        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendEmailToUsers($this->message));
        }
    }
}
