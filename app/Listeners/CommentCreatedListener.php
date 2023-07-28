<?php

namespace App\Listeners;

use App\Mail\SubscriberMail;
use App\Events\CommentCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommentCreated $event): void
    {
         $subscribers = $event->blog->subscribedUsers->filter(function($user){
            return $user->id !== auth()->id();
        });
        $subscribers->each(function($user) use ($event){
            Mail::to($user->email)->queue(new SubscriberMail($event->comment,$user));
        });
    }
}
