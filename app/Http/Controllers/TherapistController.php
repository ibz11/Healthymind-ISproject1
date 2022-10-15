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
use App\Models\Therapists;
use App\Models\Appointments;
use App\Models\ApprovedAppt;
use PDF;
class TherapistController extends Controller
{
    public function nav(){
    
    return view('Therapist.nav');
    }
    public function forumdata()
    {   $therapist=Therapists::all();
        $category=category::paginate(3);
        $thread=thread::paginate(6);
        $post=Post::paginate(5);
        $reply=Reply::paginate(6);
        return view('Therapist.forumdata',compact('therapist','post','thread','category','reply'));
    }
    public function posts(){
      $post=Post::paginate(12);
      return view('Therapist.posts',compact('post'));
    }

    public function blogdata()
    {  
     // $posts=PostsBlog::paginate(8); 

      $posts = DB::table('posts_blogs')->where('user_id', Auth::id())->paginate(10);
      return view('Therapist.blogdata',compact('posts'));
    }

    public function searchposttherapist(Request $request)
    {
      $search=$_GET['post'];
      $post=Post::paginate(1);
      $post=Post::where('post_name','Like','%'.$search.'%')->orwhere('role','Like','%'.$search.'%')->orwhere('category_name','Like','%'.$search.'%')->orwhere('thread_name','Like','%'.$search.'%')->orwhere('user_name','Like','%'.$search.'%')->get();
      return view('Therapist.posts',compact('post',));
    }
    public function searchmyposts(){
        $search=$_GET['search'];
        $posts=PostsBlog::paginate(1);
        $posts=PostsBlog::where('category','Like','%'.$search.'%')
        ->orwhere('role','Like','%'.$search.'%')
        ->orwhere('user_name','Like','%'.$search.'%')
        ->orwhere('title','Like','%'.$search.'%')
        ->orwhere('created_at','Like','%'.$search.'%')->get();
      
        return view('Therapist.blogdata',['posts'=>$posts]);
}

public function profile()
{
  $user=User::all(); 
 return view('Therapist.profile',compact('user'));
}
public function viewprofile($id)
{
   $user=User::find($id);
   $therapist=Therapists::all();
 return view('Therapist.viewprofile',compact('user','therapist'));
}  

public function createprofileview($id)
{
   $user=User::find($id);
 
 return view('Therapist.createprofile',compact('user'));
}  
public function createprofile(Request $request)
{
  
   $user=auth()->user();
   $id=$user->id;
   $name=$user->name;
   $role=$user->role;


   
   $therapist=new Therapists;
   $therapist->therapist_id=$id;

   $therapist->role=$role;
   $therapist->fname=$request->fname;  
   $therapist->lname=$request->lname;
   $therapist->email=$request->email;
   $therapist->phone=$request->phone;
   $therapist->location=$request->location;
   $therapist->university=$request->university;
   $therapist->qualification=$request->qualification;
   $therapist->description=$request->description;
  

   $image=$request->file;
   $imagename=time().'.'.$image->getClientOriginalExtension();
   $request->file->move('therapists',$imagename);
   $therapist->image= $imagename;
   

   $therapist->save();
   return redirect()->back()->with('message','Your profile is created'); 
} 


public function updateprofileview($id){
  $therapist=Therapists::find($id);
  return view('Therapist.updateprofileview',compact('therapist'));
}

public function updateprofile(Request $request,$id)
{
  
  $therapist=Therapists::find($id);
   $therapist->fname=$request->fname;  
   $therapist->lname=$request->lname;
   $therapist->email=$request->email;
   $therapist->phone=$request->phone;
   $therapist->location=$request->location;
   $therapist->university=$request->university;
   $therapist->qualification=$request->qualification;
   $therapist->description=$request->description;
   $image=$request->file;

  if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
  
        $request->file->move('therapists',$imagename);
  
        $therapist->image= $imagename;
        }

   
  
   $therapist->save();
   return redirect()->back()->with('message','Your profile is updated'); 
}

public function deleteprofile($id)
{
  $therapist=Therapists::find($id);
  $therapist->delete(); 
  return redirect()->back()->with('message','Profile has  has been deleted');
}


 public function pending()
 {
  //$Apt=Appointments::paginate(10);
  $Apt = DB::table('appointments')->where('therapist_id', Auth::id())->paginate(8);
return view('Therapist.pending',compact('Apt'));
 }
 public function approved()
 {
 $approved=ApprovedAppt::paginate(7);
 //$Apt = DB::table('approved_appts')->where('therapist_id', Auth::id())->paginate(8);
 return view('Therapist.approved',compact('approved'));
}

public function searchapttherapist(){
  $search=$_GET['search'];
  $Apt=Appointments::paginate(1);
  $Apt=Appointments::where('therapist_name','Like','%'.$search.'%')
  ->orwhere('lname','Like','%'.$search.'%')
  ->orwhere('user_name','Like','%'.$search.'%')
  ->orwhere('location','Like','%'.$search.'%')
  ->orwhere('date','Like','%'.$search.'%')
  ->orwhere('time_in','Like','%'.$search.'%')
  ->orwhere('time_out','Like','%'.$search.'%')
  ->orwhere('Approval_status','Like','%'.$search.'%')
  ->orwhere('created_at','Like','%'.$search.'%')->get();
  return view('Therapist.pending',compact('Apt'));
  //return view('Blog.myposts',['posts'=>$posts]);
}
public function searchdatetherapist()
{
  $search=$_GET['search-date'];
  $Apt=Appointments::paginate(1);
  $Apt=Appointments::where('date','Like','%'.$search.'%')->get();
  return view('Therapist.pending',compact('Apt'));
}


public function approve($id)
{
  $Apt=Appointments::find($id);
  $Apt->Approval_status='approved';
  $Apt->save();
  return redirect()->back()->with('message','Appointment has been approved');
}
public function reject($id)
{
  $Apt=Appointments::find($id);
  $Apt->Approval_status='rejected';
  $Apt->save();
  return redirect()->back()->with('message','Appointment has been cancelled');
}

public function transferview($id)
{
  $Apt=Appointments::find($id);
  return view('Therapist.transferview',compact('Apt'));
}
public function transfer($id,Request $request)
{
  $Apt=Appointments::Find($id);
  
  $Appr=new ApprovedAppt;
  $Appr->time_in=$request->time_in;
  $Appr->time_out=$request->time_out;
  $Appr->location=$request->location;
  $Appr->therapist_name=$request->fname;
  $Appr->lname=$request->lname;
  $Appr->date=$request->date;
  $Appr->therapist_id=$request->therapist_id;
  $Appr->user_id=$request->user_id;
  $Appr->user_name=$request->user_name;
  $Appr->approval_status=$request->approval_status;
  $Appr->issue=$request->issue;
  $Appr->save();
  return redirect()->back()->with('message','Your have transfered the data to approved table'); 
}

public function approvedview()
{

  //$Apt=ApprovedAppt::all();
  $Apt = DB::table('approved_appts')->where('therapist_id', Auth::id())->paginate(8);
  return view('Therapist.approved',compact('Apt'));
}





public function completed($id)
{
  $Apt=ApprovedAppt::find($id);
  $Apt->completed='Yes';
  $Apt->save();
  return redirect()->back()->with('message','Approved Appointment has been approved');
}

public function cancelled($id)
{
  $Apt=ApprovedAppt::find($id);
  $Apt->completed='Cancelled';
  $Apt->save();
  return redirect()->back()->with('message','Approved Appointment has been cancelled');
}
public function deleteapprove($id)
{
  $Apt=ApprovedAppt::find($id);
  $Apt->delete(); 
  return redirect()->back()->with('message','Approved Appointment has been deleted');
}
public function searchaptapprove(){
  $search=$_GET['search'];
  $Apt=ApprovedAppt::paginate(1);
  $Apt=ApprovedAppt::where('therapist_name','Like','%'.$search.'%')
  ->orwhere('lname','Like','%'.$search.'%')
  ->orwhere('user_name','Like','%'.$search.'%')
  ->orwhere('location','Like','%'.$search.'%')
  ->orwhere('date','Like','%'.$search.'%')
  ->orwhere('time_in','Like','%'.$search.'%')
  ->orwhere('time_out','Like','%'.$search.'%')
  ->orwhere('Approval_status','Like','%'.$search.'%')
  ->orwhere('completed','Like','%'.$search.'%')
  ->orwhere('created_at','Like','%'.$search.'%')->get();
  return view('Therapist.approved',compact('Apt'));
  //return view('Blog.myposts',['posts'=>$posts]);
}

public function searchdateapprove()
{
  $search=$_GET['search-date'];
  $Apt=ApprovedAppt::paginate(1);
  $Apt=ApprovedAppt::where('date','Like','%'.$search.'%')->get();
  return view('Therapist.approved',compact('Apt'));
}
public function diagnosis($id)
{
  $Apt=ApprovedAppt::find($id);
  return view('Therapist.diagnosis',compact('Apt'));
  //return redirect()->back()->with('message','Approved Appointment has been deleted');
}
public function diagnosisform($id,Request $request)
{
  $Apt=ApprovedAppt::Find($id);
  $Apt->diagnosis=$request->diagnosis;
  $Apt->prescription=$request->prescription;
  $Apt->save();
  return redirect()->back()->with('message','Success Your have created a diagnosis and prescription for the patient'); 

}

public function editdiagnosisview($id){
  $Apt=ApprovedAppt::find($id);
  return view('Therapist.editdiagnosis',compact('Apt'));
}

public function editdiagnosisform($id,Request $request){
  $Apt=ApprovedAppt::Find($id);
  $Apt->diagnosis=$request->diagnosis;
  $Apt->prescription=$request->prescription;
  $Apt->save();
  return redirect()->back()->with('message','Success Your have edited the diagnosis and prescription for the patient'); 
}

public function diagnosisview($id){
  $Apt=ApprovedAppt::find($id); 
  return view('Therapist.viewdiagnosis',compact('Apt'));
}

public function diagnosispdf($id)
{
  $Apt=ApprovedAppt::find($id);
  $pdf = PDF::loadView('Therapist.diagnosispdf',compact('Apt'));   
  return $pdf->download('Diagnosis&prescription.pdf'); 
}

}
