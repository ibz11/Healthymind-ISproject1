@include('home.nav')
<div style="height:260vh;"class=" mt-3 container-fluid">


@if(Auth::check())

<div class="table-responsive">

<table class="m-3 table">
    <div class="text-center">
    
    <h2 style="font-size:33px;" class="mb-1"><strong> Below are all your appointments </strong></h2></div>
    <form class="form-inline" action="{{URL('searchmyappointment')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" placeholder="Search Appointments by therapist name,lastname,status, date and location "name="search">

<button type="submit"   style="color:black;"class="ml-3 btn btn-primary" >Search</button>
</form>


<form class="form-inline" action="{{URL('searchdate')}}" style="padding:20px;" type="get">
@csrf 
<input class="ml-1"type="date" name="search-date">
<button type="submit"   style="color:black;"class="ml-3 btn btn-primary" >Search-date</button>
</form>



<a class="ml-3 btn btn-success" href="{{URL('appointments')}}">Refresh</a>

<div>
@if(method_exists($Apt,'links'))
<div class="d-flex justify-content-center">
  {!! $Apt->links()!!} 
</div>
@endif
<thead>
    <tr>
      <th scope="col"> id</th>
      <th scope="col">User Name</th>
      <th scope="col">Therapist_id</th>
      <th scope="col">Therapist_FName</th>
      <th scope="col">Therapist_LName</th>
      <th scope="col">Location</th>
      <th scope="col">Date</th>
      <th scope="col">Time_in</th>
      <th scope="col">Time_out</th>
      <th scope="col">Approval status</th>
      <th scope="col">Created at</th>
     

    
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      <th scope="col">View</th>
      <th scope="col">Print pdf</th>
      
      
    </tr>
  </thead>
</tbody>
      @foreach($Apt as $Apt)
      
      @if (isset(Auth::user()->id) && Auth::user()->id  == $Apt->user_id)
    <tr>
      <th scope="row">{{$Apt->id}}</th>
      <td>{{$Apt->user_name}}</td>
      <td>{{$Apt->therapist_id}}</td>
      <td>Dr.{{$Apt->therapist_name}}
      <td>{{$Apt->lname}}</td>
      <td>{{$Apt->location}}</td>
      <td>{{$Apt->date}}</td>
      <td>{{$Apt->time_in}}</td>
      <td>{{$Apt->time_out}}</td>
      <td>
      @if($Apt->Approval_status == 'approved')
       <span class="badge bg-success"> {{$Apt->Approval_status}}</span>
       @elseif($Apt->Approval_status == 'rejected')
       <span class="badge bg-danger"> {{$Apt->Approval_status}}</span>
       @else
       <span class="badge bg-info"> {{$Apt->Approval_status}}</span>
       @endif
    </td>
  
     
     
     

       @if($Apt->Approval_status == 'approved')
       <td> <a href="{{URL('viewApt',$Apt->id )}}" class="m-1 btn btn-primary">View</a></td>
      <td> <a href="{{URL('Aptpdf',$Apt->id )}}" class="m-1 btn btn-info">Print pdf</a></td>
      <td> <a href="{{URL('deleteApt',$Apt->id )}}" class="m-1 btn btn-danger">Delete</a></td>
      @elseif($Apt->Approval_status == 'rejected')
      <td> <a href="{{URL('deleteApt',$Apt->id )}}" class="m-1 btn btn-danger">Delete</a></td>
      @else

      <td> <a href="{{URL('updateAptview',$Apt->id )}}" class="m-1 btn btn-success">Update</a></td>
      <td> <a href="{{URL('deleteApt',$Apt->id )}}" class="m-1 btn btn-danger">Delete</a></td>
     @endif

</td>


<div>
    </tr>
    
    @endif
    @endforeach 
</table>
</div>
<div class="table-responsive">

<table class="m-3 table">
    <div class="mt-5 text-center">
    
    <h2 style="font-size:33px;" class="mb-1"><strong> Here are your approved  appointments </strong></h2></div>
    

    <div>
@if(method_exists($Appr,'links'))
<div class="d-flex justify-content-center">
  {!! $Appr->links()!!} 
</div>
@endif
<thead>
    <tr>
      <th scope="col"> id</th>
      <th scope="col">User Name</th>
      <th scope="col">Therapist_id</th>
      <th scope="col">Therapist_FName</th>
      <th scope="col">Therapist_LName</th>
      <th scope="col">Location</th>
      <th scope="col">Date</th>
      <th scope="col">Time_in</th>
      <th scope="col">Time_out</th>
      <th scope="col">Issue</th>
      <th scope="col">Approval status</th>
      <th scope="col">Completion status</th>
      <th scope="col">Created at</th>
     

    
      
      <th scope="col">View Diagnosis</th>
      
      <th scope="col">Print diagnosis</th>
      
      
      
    </tr>
  </thead>
</tbody>

      @foreach($Appr as $Appr)
      
     
    <tr>
      <th scope="row">{{$Apt->id}}</th>
      <td>{{$Appr->user_name}}</td>
      <td>{{$Appr->therapist_id}}</td>
      <td>Dr.{{$Appr->therapist_name}}
      <td>{{$Appr->lname}}</td>
      <td>{{$Appr->location}}</td>
      <td>{{$Appr->date}}</td>
      <td>{{$Appr->time_in}}</td>
      <td>{{$Appr->time_out}}</td>
      <td>{{$Appr->issue}}</td>
      <td>
      @if($Appr->approval_status == 'approved')
       <span class="badge bg-success"> {{$Appr->approval_status}}</span>
       @elseif($Appr->approval_status == 'rejected')
       <span class="badge bg-danger"> {{$Appr->approval_status}}</span>
       @else
       <span class="badge bg-info"> {{$Appr->approval_status}}</span>
       @endif
    </td>
    <td>
    @if($Appr->completed == 'Yes')
       <span class="badge bg-primary">{{$Appr->completed}}</span>
       @elseif($Appr->completed == 'Cancelled')
       <span class="badge bg-danger">{{$Appr->completed}}</span>
       @else
       <span class="badge bg-info"> {{$Appr->completed}}</span>
       @endif
    </td>
      <td>{{$Appr->created_at}}</td>
     
     
     
      @if($Appr->completed == 'Yes')
   
 
      <td> <a href="{{URL('viewdiagnosis',$Appr->id )}}" class="m-1 btn btn-info">View diagnosis </a></td>
      
      <td> <a href="{{URL('diagnosispdf',$Appr->id )}}" class="m-1 btn btn-warning">Print diagnosis </a></td>
      
      @else

      @endif

     

</td>


<div>
    </tr>
    
 
    @endforeach 
</table>
@else
<h2 style="font-size:33px;" class="mb-1"><strong> You must be logged in to check your appointments.Login here:</strong></h2>
<a class="btn btn-primary"href="{{URL('login')}}">Login</a>
<h2 style="font-size:33px;" class="mt-2"><strong> Or if you dont have an account you can register here:</strong></h2>
<a class="btn btn-success"href="{{URL('register')}}">Register</a>

@endif











</div>