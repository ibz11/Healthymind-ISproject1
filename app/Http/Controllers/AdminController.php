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
use PDF;

class AdminController extends Controller
{
    public function addtherapist($id,Request $request){
        $data = new Therapists;
        //$data=User::find($id);
        $data->therapist_id=$request->therapist_id;
       
        $data->phone=$request->phone;
        $data->role=$request->role;
        $data->email=$request->email;
        $data->save();
        return redirect()->back()->with('message','User added to therapist table'); 
     }
   
  
         
           public function users(){
            $data=User::all();
            $data = User::paginate(6);
            $user=auth()->user();
            $id=$user->id;
                 
            return view('Admin.users',compact('data'));
        } 
         
         public function updateuser($id){
            $user=User::find($id);
            
             return view('Admin.CRUD.updateuser', compact('user'));
         }
         public function updateusers($id,Request $request){
            $data=User::find($id);
            $data->name=$request->name;
            $data->phone=$request->phone;
            $data->role=$request->role;
            $data->save();
            return redirect()->back()->with('message','data is updated'); 
         }
         public function deleteuser($id){
         $data=User::find($id);
         $data->delete();
         return redirect()->back()->with('message','User  is deleted');
         }
//PDF

public function userspdf(){
  
  
    $user=User::all();
    $pdf = PDF::loadView('Admin.pdf.allusers',compact('user'));   
    return $pdf->download('Allusers.pdf');       
}



public function therapistsprofiles()
{
 $therapist=Therapists::paginate(10);
 return view('Admin.therapistprofile',compact('therapist'));
}


public function therapistspdf(){
  
  
    $therapist=Therapists::all();
    $pdf = PDF::loadView('Admin.pdf.therapistspdf',compact('therapist'));   
    return $pdf->download('Alltherapists.pdf');       
}


public function alltherapists(){
   // $user=User::all();
    $user = DB::table('users')->where('role','therapist')->paginate(10);
    return view('Admin.alltherapist',compact('user'));
}


public function alleditors(){
    // $user=User::all();
     $user = DB::table('users')->where('role','editor')->paginate(10);
     return view('Admin.alleditors',compact('user'));
 }

//Make Therapist
 public function maketherapist($id)
{
  $user=user::find($id);
  $user->role='therapist';
  $user->save();
  return redirect()->back()->with('message','User has been made into a Therapist');
}

//Make editor
public function makeeditor($id)
{
    $user=user::find($id);
    $user->role='editor';
    $user->save();
  return redirect()->back()->with('message','User has been made into an Editor');
}
public function makeuser($id)
{
  $user=user::find($id);
  $user->role='user';
  $user->save();
  return redirect()->back()->with('message','User has been changed to User role');
}

public function searchusers(){
    $search=$_GET['search'];
    $data=User::paginate(1);
    $data=User::where('name','Like','%'.$search.'%')
    ->orwhere('role','Like','%'.$search.'%')
    ->orwhere('id','Like','%'.$search.'%')
    ->orwhere('email','Like','%'.$search.'%')->get();
   
    
   return view('Admin.users',['data'=>$data]);
}

public function searchprofile(){
    $search=$_GET['search'];
    $therapist=Therapists::paginate(1);
    $therapist=Therapists::where('fname','Like','%'.$search.'%')
    ->orwhere('lname','Like','%'.$search.'%')
    ->orwhere('role','Like','%'.$search.'%')
    ->orwhere('university','Like','%'.$search.'%')
    ->orwhere('therapist_id','Like','%'.$search.'%')
    ->orwhere('description','Like','%'.$search.'%')
    ->orwhere('location','Like','%'.$search.'%')
    ->orwhere('qualification','Like','%'.$search.'%')
    ->orwhere('email','Like','%'.$search.'%')->get();
   
    
   return view('Admin.therapistprofile',['therapist'=>$therapist]);
}
public function searchalltherapists(){
    $search=$_GET['search'];
    $user=User::paginate(1);
    $user=User::where('name','Like','%'.$search.'%')
    ->orwhere('role','Like','%'.$search.'%')
    ->orwhere('id','Like','%'.$search.'%')
    ->orwhere('email','Like','%'.$search.'%')->get();
   return view('Admin.alltherapist',['user'=>$user]);
}
public function searchalleditors(){
    $search=$_GET['search'];
    $user=User::paginate(1);
    $user=User::where('name','Like','%'.$search.'%')
    ->orwhere('role','Like','%'.$search.'%')
    ->orwhere('id','Like','%'.$search.'%')
    ->orwhere('email','Like','%'.$search.'%')->get();
   
    
   return view('Admin.alleditors',['user'=>$user]);
}


}
