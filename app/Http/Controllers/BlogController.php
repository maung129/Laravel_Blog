<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin')->except('index');
    }
    public function index(){
        return view('blogs',[
            'blogs' => Blog::latest()->filter(request(['search','category','author']))->paginate(3),
            'categories' => Category::all()
        ]);
    }

    public function create(){
        return view('blogs.create',[
            'categories'=>Category::all()
        ]);
    }

    public function dashboard(){
        return view('blogs.dashboard',[
            'blogs'=>auth()->user()->blogs
        ]);
    }

    public function store(){

       $cleanData =  request()->validate([
            'title'=>['required'],
            'slug'=>['required'],
            'intro'=>['required'],
            'category_id'=>['required',Rule::exists('categories','id')],
            'description'=>['required']
        ]);

        $path = request()->file('photo')->store('/images');
        $cleanData['photo'] = $path;

        $cleanData['user_id'] = auth()->id();
        Blog::create($cleanData);

       return redirect('/');
    }

    public function destroy(Blog $blog){
        $blog->delete();

        return back();
    }

    public function edit(Blog $blog){
        return view('blogs/edit',[
            'blog'=>$blog,
            'categories' => Category::all()
        ]);
    }
}
