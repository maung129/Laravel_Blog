<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function toggleSubscribe(Blog $blog){
        if($blog->isSubscribed()){
            $blog->unsubscribe();
        }
        else{
            $blog->subscribe();
            return back();
        }
    }
}
