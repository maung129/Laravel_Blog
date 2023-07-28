<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','intro','category_id','photo','description','user_id'];

    protected $with = ['category','author'];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeFilter($query,$filters){
        if($filters['search'] ?? null){
            $query
            ->where(function ($query) use ($filters){
                $query->where('title','LIKE','%'.$filters['search'].'%')
                ->orWhere('description','LIKE','%'.$filters['search'].'%');
            });

        }
        if($filters['category'] ?? null){

                $query->whereHas('category',function($query) use ($filters) {
                    $query->where('slug',$filters['category']);
                });


        }
        if($filters['author'] ?? null){

                $query->whereHas('author',function($query) use ($filters){
                    $query->where('username',$filters['author']);
                });


        }

    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribedUsers(){
        return $this->belongsToMany(User::class,'subscriptions','blog_id','user_id');
    }

    public function subscribe($userId = null){
        return $this->subscribedUsers()->attach(['user_id'=>$userId ?? auth()->id()]);
    }

    public function unsubscribe($userId = null){
        return $this->subscribedUsers()->detach(['user_id'=>$userId ?? auth()->id()]);
    }

    public function isSubscribed($userId = null){
        return $this->subscribedUsers && $this->subscribedUsers->contains('id',$userId ?? auth()->id());
    }

}
