<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Thread;
use App\Models\Post;
use App\Models\Reply;
use App\Models\PostsBlog;

class EditorController extends Controller
{
    public function forumdata()
    {
        $category=category::paginate(3);
        $thread=thread::paginate(6);
        $post=Post::paginate(5);
        $reply=Reply::paginate(5);
      return view('Editor.forumdata',compact('post','thread','category','reply'));
    }
    public function blogdata()
    {
        
        $posts=PostsBlog::paginate(8);
       
      return view('Editor.blogdata',compact('posts'));
    }
    public function mycreations()
    {
      /*$category=category::paginate(6);
      $thread=thread::paginate(10);
      $post=Post::paginate(6);
      $reply=Reply::paginate(6);*/
      
      $category = DB::table('categories')->where('user_id', Auth::id())->paginate(8);
      $thread = DB::table('threads')->where('user_id', Auth::id())->paginate(8);
      $post= DB::table('posts')->where('user_id', Auth::id())->paginate(8);
      $reply = DB::table('replies')->where('user_id', Auth::id())->paginate(8);

      return view('Editor.mycreations',compact('post','thread','category','reply'));
    }
}
