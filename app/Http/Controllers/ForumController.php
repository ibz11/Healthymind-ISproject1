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

class ForumController extends Controller
{
    public function forum(){
       // $forum->forum::all();
       // return view('Forum.index');
        $category=category::all();
        return view('Forum.index',compact('category'));
    }
    public function category($id){
        // $forum->forum::all();
        //$dat=category::all();
        $category=Category::find($id);
        $thread=Thread::all();
         return view('Forum.singlecategorypage',compact('category','thread'));
     }

     public function thread($id){
        // $forum->forum::all();
        $thread=Thread::find($id);
        $post=Post::all();
        $user=User::all();
         return view('Forum.singlethreadpage',compact('thread','post','user'));
     }

     public function posts($id){
        // $forum->forum::all();
        $post=Post::where('id',$id)->get();
       // $posts=Post::all();
        $user=User::all();
        $reply=Reply::all();
         return view('Forum.singlepostpage',compact('post','user','reply'));
     }
    
     public function reply(){
        // $forum->forum::all();
         return view('Forum.singlereplypage');
     }

    //CREATE VIEWS
    public function createcategoryview(){
        // $forum->forum::all();
         return view('Forum.Create.category');
     }

     
     public function createcategory(Request $request){
      $user=auth()->user();
      $id=$user->id;
      $name=$user->name;
      $role=$user->role;
      
      $category=new Category;
      $category->user_id=$id;
      $category->user_name=$name;
      $category->role=$role;
      $category->category_name=$request->name;
      $category->save();
      return view('Forum.Create.category');

     }


     public function createthreadview($id){
        // $forum->forum::all();
        $category=Category::find($id);
        $user=auth()->user();
        $id=$user->id;
        return view('Forum.Create.thread',compact('user','category'));
     }

     public function createthread(Request $request)
     { 
       // $thread=Thread::find($id);
      
      // $category=Category::find($id);

      $user=auth()->user();
      $id=$user->id;
      $name=$user->name;
      $role=$user->role;
     
      $thread=new Thread;
      $thread->user_id=$id;
      $thread->user_name=$name;
      $thread->role=$role;
      // $category=DB::table('category' && 'thread')->where('id'=='category_id');
     // $thread->category_name=$request->name;
     //$thread->category_id=$request->category_id;
    //category_id
      $thread->category_id=$request->category_id;
      $thread->category_name=$request->category_name;
      $thread->thread_name=$request->thread_name;
      $thread->description=$request->description;
      $thread->save();
      //'category',
     
      return view('Forum.MSG.create',compact('thread'));
   
    }

     public function createpostview($id){
       
        $thread=Thread::find($id);
        return view('Forum.Create.post',compact('thread'));
     }
      
     public function createpost(Request $request)
     {
      $user=auth()->user();
      $id=$user->id;
      $name=$user->name;
      $role=$user->role;


      
      $post=new Post;
      $post->user_id=$id;
      $post->user_name=$name;
      $post->role=$role;
      $post->category_name=$request->name;
      $post->thread_id=$request->thread_id;
      $post->category_name=$request->category_name;
      $post->thread_name=$request->thread_name;
      $post->post_name=$request->post_name;
      $post->Description=$request->description;
      $post->content=$request->content;
     $post->save();
     $thread=Thread::find($id);
    // return view('Forum.Create.Post',compact('thread'));
     return view('Forum.MSG.create');
     }


     public function createreplyview($id){
      $post=Post::find($id);
        return view('Forum.Create.reply',compact('post'));
     }

     public function createreply(Request $request){
      $user=auth()->user();
      $id=$user->id;
      $name=$user->name;
      $role=$user->role;

      $reply=new Reply;
      $reply->user_id=$id;
      $reply->user_name=$name;
      $reply->role=$role;
      $reply->post_id=$request->post_id;
      $reply->reply=$request->reply;
      $reply->save();


      return view('Forum.MSG.create');

     }

     //UPDATE VIEWS
     public function updatecategoryview($id){
        // $forum->forum::all();
        $category=Category::find($id);
         return view('Forum.Update.category',compact('category'));
     }


     public function updatecategory(Request $request,$id){
      $category=Category::find($id);
      $category->category_name=$request->category_name;
      $category->user_id=$request->user_id;
      $category->user_name=$request->user_name;
      $category->id=$request->category_id;
      $category->role=$request->role;
      $category->save();
      return view('Forum.Update.category', compact('category'));
     }


     public function updatethreadview($id){
      $thread=Thread::find($id);
      
         return view('Forum.Update.thread',compact('thread'));
     }
     public function updatethread($id,Request $request){
      $thread=Thread::find($id);
      $thread->id=$request->thread_id;
      $thread->user_id=$request->user_id;
      $thread->user_name=$request->user_name;
      $thread->category_id=$request->category_id;
      $thread->category_name=$request->category_name;
      $thread->thread_name=$request->thread_name;
      //$thread->description=$request->description;
      $thread->role=$request->role;
      $thread->save();
     // return view('Forum.Update.thread',compact('thread'));
      return view('Forum.Msg.update');
     }
     public function updatepostview($id){
        
        $post=Post::find($id);
         return view('Forum.Update.post',compact('post'));
     }
     public function updatepost($id,Request $request){
      $post=Post::find($id);
      //$post->user_id=$request->user_id;
      $post->user_name=$request->user_name;
      $post->post_name=$request->post_name;
      $post->content=$request->content;
      $post->Description=$request->Description;
      $post->save();
       //return view('Forum.Update.post',compact('post'));
       return view('Forum.Msg.update');
   }
     public function updatereplyview($id){
      $reply=Reply::find($id);
      $post=Post::find($id);
         return view('Forum.Update.reply',compact('reply','post'));
     }
     public function updatereply($id,Request $request){
        $reply=Reply::find($id);
        $posts=Post::find($id);
        $reply->user_name=$request->user_name;
        $reply->reply=$request->reply;
        $reply->save();
        
        return view('Forum.Msg.update');
     }



     /*Search functionalities*/
     public function searchcategory(){
        $search=$_GET['category'];
        $category=Category::paginate(1);
        $category=Category::where('category_name','Like','%'.$search.'%')->orwhere('role','Like','%'.$search.'%')->orwhere('user_name','Like','%'.$search.'%')->get();
      
        return view('Forum.index',compact('category'));
        }
        public function searchthread($id ,Request $request){
            $search=$_GET['thread'];
            $thread=Thread::paginate(1);
            $thread=Thread::where('thread_name','Like','%'.$search.'%')->orwhere('role','Like','%'.$search.'%')->orwhere('user_name','Like','%'.$search.'%')->get();
           $category=Category::find($id);
            return view('Forum.singlecategorypage',compact('thread','category'));
            }

            public function searchpost($id ,Request $request){
                $search=$_GET['post'];
                $post=Post::paginate(1);
                $post=Post::where('post_name','Like','%'.$search.'%')->orwhere('role','Like','%'.$search.'%')->orwhere('user_name','Like','%'.$search.'%')->get();
               $thread=Thread::find($id);
                return view('Forum.singlethreadpage',compact('post','thread'));
                }

     


                public function creations(){
                    //$category=category::paginate(6);
                    //$thread=thread::paginate(10);
                    //$post=Post::paginate(6);
                    //$reply=Reply::paginate(6);
                    $category = DB::table('categories')->where('user_id', Auth::id())->paginate(8);
                    $thread = DB::table('threads')->where('user_id', Auth::id())->paginate(8);
                    $post= DB::table('posts')->where('user_id', Auth::id())->paginate(8);
                    $reply = DB::table('replies')->where('user_id', Auth::id())->paginate(8);
                    return view('Forum.creations',compact('post','thread','category','reply'));
                }
public function deletecategory($id)
{
     $category=Category::find($id);
     $category->delete();
     return redirect()->back()->with('message','Product is remove from cart');
 

}
public function deletethread($id)
{
     $thread=Thread::find($id);
     $thread->delete();
     return redirect()->back()->with('message','Product is remove from cart');
 

}
public function deletepost($id)
{
     $post=Post::find($id);
     $post->delete();
     return redirect()->back()->with('message','Product is remove from cart');
 

}
public function deletereply($id)
{
     $reply=Reply::find($id);
     $reply->delete();
     return redirect()->back()->with('message','Product is remove from cart');
 

}




}
