<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\PostsBlog;

class BlogpostsController extends Controller
{
 
public function posts(){
 $posts=PostsBlog::paginate(2);
  return view('Blog.posts',['posts'=>$posts]);
 }
 public function myposts(){
    $posts=PostsBlog::paginate(6);
     return view('Blog.myposts',['posts'=>$posts]);
    }
public function searchmyposts(){
                        $search=$_GET['search'];
                        $posts=PostsBlog::paginate(1);
                        $posts=PostsBlog::where('category','Like','%'.$search.'%')
                        ->orwhere('role','Like','%'.$search.'%')
                        ->orwhere('user_name','Like','%'.$search.'%')
                        ->orwhere('title','Like','%'.$search.'%')
                        ->orwhere('created_at','Like','%'.$search.'%')->get();
                      
                        return view('Blog.myposts',['posts'=>$posts]);
}
public function searchallposts(){
    $search=$_GET['search'];
    $posts=PostsBlog::paginate(1);
    $posts=PostsBlog::where('category','Like','%'.$search.'%')
    ->orwhere('role','Like','%'.$search.'%')
    ->orwhere('user_name','Like','%'.$search.'%')
    ->orwhere('title','Like','%'.$search.'%')
    ->orwhere('created_at','Like','%'.$search.'%')->get();
  
    return view('Blog.posts',['posts'=>$posts]);
    }

}
