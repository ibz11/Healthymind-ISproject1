<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Therapists;
use App\Models\messages;
use App\Models\Category;
use App\Models\Thread;
use App\Models\Post;
use App\Models\Reply;
use App\Models\PostsBlog;
use App\Models\Appointments;
use App\Models\ApprovedAppt;

class HomeController extends Controller
{
   




    public function home(){
  
       $therapist=Therapists::paginate(4);
        return view('home.home',compact('therapist'));
    }

    
   
 


 public function redirect(){
 
   $role=Auth::user()->role;
    if($role=='admin')
    {
   //$count=messages::where('sender_id',$user->id)->count();
$sessions = DB::table('sessions') -> select('*') -> count();

$therapists = DB::table('users')->where('role','therapist')->count();
$editors = DB::table('users')->where('role','editor')->count();
$userrole = DB::table('users')->where('role','user')->count();
$profiles=Therapists::all()->count();
$users=User::all()->count();

$user=auth()->user();
$id=$user->id;

return view('Admin.admin', compact('therapists','userrole','profiles', 'editors','users','sessions'));
       
    }
    else if($role=='editor'){
        $category=Category::all()->count();
        $thread=Thread::all()->count();
        $post=Post::all()->count();
        $reply=Reply::all()->count();
        $posts=PostsBlog::all()->count();
        return view('Editor.editor',compact('category','thread','post','posts','reply'));
    }
    else if($role =='therapist'){
        $Apt=Appointments::all()->where('Approval_status','pending')->count();
        $reject=Appointments::all()->where('Approval_status','rejected')->count();
        $online=ApprovedAppt::all()->where('location','Online')->count();
        $Approve=ApprovedAppt::all()->count();
        $complete=ApprovedAppt::all()->where('completed','Yes')->count();
        $cancelled=ApprovedAppt::all()->where('completed','Cancelled')->count();
        $post=Post::all()->count();
        $posts=PostsBlog::all()->count();
        return view('Therapist.home',compact('post','posts','Apt','Approve','complete','cancelled','reject','online'));
    }
   
    else{
        $therapist=Therapists::paginate(4);
        return view('home.home',compact('therapist'));
    }
 }
 public function forum(){
     $forum->forum::all();
     return view('Forum.index');
 } 


 public function alltherapistsview(){
    $therapist=Therapists::paginate(10);
    return view('home.alltherapists',compact('therapist'));
 }
 public function searchtherapist(){
    $search=$_GET['therapist'];
    $therapist=Therapists::paginate(1);
    $therapist=Therapists::where('fname','Like','%'.$search.'%')->orwhere('lname','Like','%'.$search.'%')->orwhere('location','Like','%'.$search.'%')->get();
    return view('home.alltherapists',compact('therapist')); 
}


}