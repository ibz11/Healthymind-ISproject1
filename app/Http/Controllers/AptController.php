<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Therapists;
use App\Models\Appointments;
use App\Models\ApprovedAppt;
use PDF;

class AptController extends Controller
{
public function viewtherapist($id)
{
    $therapist=Therapists::Find($id);

    return view('home.viewtherapist',compact('therapist'));
}
public function viewalltherapists(){
    $therapist=Therapists::all();
    return view('home.alltherapists',compact('therapist'));
}

public function viewdiagnosis($id){
  
    $Apt=ApprovedAppt::find($id);
     return view('home.diagnosisview',compact('Apt'));
 }









public function createappointment(Request $request)
{
    
   $user=auth()->user();
   $id=$user->id;
   $name=$user->name;
  


   
   $Apt=new Appointments;
   $Apt->user_id=$id;
   $Apt->user_name=$name;
   
   $Apt->therapist_id=$request->therapist_id;  
   $Apt->therapist_name=$request->fname;
   $Apt->lname=$request->lname;
   $Apt->issue=$request->issue;
   $Apt->date=$request->date;
   $Apt->time_in=$request->time_in;
   $Apt->time_out=$request->time_out;
   $Apt->location=$request->location;
   $Apt->save();

   return view('home.MSG.apt');
}
public function appointments(){
   // $Apt=Appointments::where('user_id'== auth()->user()->id);
    $Apt = DB::table('appointments')->where('user_id', Auth::id())->paginate(8);
    $Appr = DB::table('approved_appts')->where('user_id', Auth::id())->paginate(8);
    //paginate(7);
    return view('home.appointments',compact('Apt','Appr'));
}


public function searchmyappointment(){
    $search=$_GET['search'];
    $Apt=Appointments::paginate(1);
    $Apt=Appointments::where('therapist_name','Like','%'.$search.'%')
    ->orwhere('lname','Like','%'.$search.'%')
    ->orwhere('location','Like','%'.$search.'%')
    ->orwhere('date','Like','%'.$search.'%')
    ->orwhere('time_in','Like','%'.$search.'%')
    ->orwhere('time_out','Like','%'.$search.'%')
    ->orwhere('Approval_status','Like','%'.$search.'%')
    ->orwhere('created_at','Like','%'.$search.'%')->get();
    return view('home.appointments',compact('Apt'));
    //return view('Blog.myposts',['posts'=>$posts]);
}
public function searchdate()
{
  $search=$_GET['search-date'];
  $Apt=Appointments::paginate(1);
  $Apt=Appointments::where('date','Like','%'.$search.'%')->get();

  return view('home.appointments',compact('Apt'));
}
public function viewApt($id)
{
    $Apt=Appointments::Find($id);
return view('home.Aptview',compact('Apt'));
}
public function updateAptview($id)
{
    $Apt=Appointments::Find($id);
    return view('home.UpdateAptview',compact('Apt'));
}
public function updateApt($id,Request $request)
{
    $Apt=Appointments::Find($id);
    $Apt->time_in=$request->time_in;
    $Apt->time_out=$request->time_out;
    $Apt->location=$request->location;
    $Apt->location=$request->location;
    $Apt->issue=$request->issue;
    $Apt->save();
    return view('home.Msg.update');
}


public function deleteApt($id)
{
$Apt=Appointments::Find($id);
$Apt->delete();  
return view('home.MSG.delete');
}
public function Aptpdf($id){
  
  
    $Apt=Appointments::find($id);
    $pdf = PDF::loadView('home.Aptview',compact('Apt'));   
    return $pdf->download('Myappointment.pdf');       
}



/*public function searchapprovedappt(){
    $search=$_GET['searchapproved'];
    $Appr=ApprovedAppt::paginate(1);
    $Appr=ApprovedAppt::where('therapist_name','Like','%'.$search.'%')
    ->orwhere('lname','Like','%'.$search.'%')
    ->orwhere('location','Like','%'.$search.'%')
    ->orwhere('date','Like','%'.$search.'%')
    ->orwhere('time_in','Like','%'.$search.'%')
    ->orwhere('time_out','Like','%'.$search.'%')
    ->orwhere('Approval_status','Like','%'.$search.'%')
    ->orwhere('created_at','Like','%'.$search.'%')->get();
    return view('home.appointments',compact('Appr'));
    //return view('Blog.myposts',['posts'=>$posts]);
}
public function searchdateapproved(){  
$search=$_GET['search-dateapproved'];
  $Appr=ApprovedAppt::paginate(1);
  $Appr=ApprovedAppt::where('date','Like','%'.$search.'%')->get();

  return view('home.appointments',compact('Appr'));
}*/











}
