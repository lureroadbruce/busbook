<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\EmailTemplet;

use App\Models\User;
use Mail;
class SendEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $user, $emailTitle,$emailBody;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(EmailTemplet $email, User $user)
    {
        $this->user = $user;
        $this->emailTitle = $email->title;
        $this->emailBody = $email->body;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        $user = $this->user;
        $emailTitle = $this->emailTitle;
        $emailBody = $this->emailBody;

        Mail::send('emails.temple', [ 'user' => $user, 'emailTitle' => $emailTitle,'emailBody'=>$emailBody ], function ( $m ) use ( $user,$emailTitle )
                        {
                            $m->from('bruce@lureroad.com','lureroad')->to($user->email,$user->name)->subject($emailTitle);
                        });


    }
}
