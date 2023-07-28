<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $cleanData = request()->validate([
            "body"=>['required','min:10']
        ]);
        $cleanData['user_id'] = auth()->id();

        $blog->comments()->create($cleanData);

        // $subscribers = $blog->subscribedUsers->filter(function($user){
        //     return $user->id !== auth()->id();
        // });
        // $subscribers->each(function($user) use ($comment){
        //     Mail::to($user->email)->queue(new SubscriberMail($comment,$user));
        // });

    //    CommentCreated::dispatch($comment,$blog);


        return back();

    }
}
