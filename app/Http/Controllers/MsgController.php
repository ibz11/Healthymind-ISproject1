<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\messages;
use App\Models\User;

class MsgController extends Controller
{
    //Messages for admin
    
    public function sendmessage(Request $request){
        $user=auth()->user();
        $id=$user->id;
        $name=$user->name;
        $role=$user->role;
    
        $data = new messages;
    
        $data->sender_id=$id;
        $data->name=$name;
        $data->role=$role;
        $data->receiver_id=$request->receiver;
    
        $data->quickreply=$request->quickreply;
        $data->longreply=$request->longreply;
        $data->save();
        return redirect()->back()->with('message','Message is sent');  
    }
    public function messagesview(){
        $user=User::all();
        $messages=messages::all();
        return view('Admin.Msg.messages',compact('user','messages',));
    }
    public function replyview(){
        $messages=messages::all();
        $user=User::where('role','=', 'therapist')->get();
        return view('Admin.Msg.reply',compact('user','messages'));
    }
    public function deletemsg($id){
        $messages=messages::find($id);
        $messages->delete(); 
        return redirect()->back()->with('message','message is deleted');
    }
    public function replymsg(){
        $user=auth()->user();
        $id=$user->id;
        $name=$user->name;
        $role=$user->role;
           $data = new messages;
    
        $data->sender_id=$id;
        $data->name=$name;
        $data->role=$role;
        $data->receiver_id=$request->receiver;
    
        $data->quickreply=$request->quickreply;
        $data->longreply=$request->longreply;
        $data->save();
        return redirect()->back()->with('message','Message is sent');
    }
    public function searchmsg(){
        $search=$_GET['query'];
        $messages=messages::paginate(1);
        $messages=messages::where('name','Like','%'.$search.'%')->orwhere('role','Like','%'.$search.'%')->orwhere('sender_id','Like','%'.$search.'%')->orwhere('receiver_id','Like','%'.$search.'%')->orwhere('sender_id','Like','%'.$search.'%')->orwhere('created_at','Like','%'.$search.'%')->get();
        $user=auth()->user();
        $id=$user->id;
        $count=messages::where('sender_id',$user->id)->count();
        return view('Admin.Msg.reply',compact('messages','count'));
        }
        public function searchmsgsent(){
            $search=$_GET['query'];
            $messages=messages::paginate(1);
            $messages=messages::where('name','Like','%'.$search.'%')->orwhere('role','Like','%'.$search.'%')->orwhere('sender_id','Like','%'.$search.'%')->orwhere('receiver_id','Like','%'.$search.'%')->orwhere('sender_id','Like','%'.$search.'%')->orwhere('created_at','Like','%'.$search.'%')->get();
            $user=auth()->user();
            $id=$user->id;
            $count=messages::where('sender_id',$user->id)->count();
            return view('Admin.Msg.messages',compact('messages','count'));
            }
}
