@include('Therapist.nav')
<div class=" mt-3 container-fluid">
<div class="table-responsive">
<table class=" table table-sm">
    <div class="text-center"><h2 style="font-size:20px;" class="mb-1"> Approved Appointments </h2></div>

    <form class="form-inline" action="{{URL('searchaptapprove')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" placeholder="Search Appointments by therapist name,lastname,status, date and location "name="search">

<button type="submit"   style="color:black;"class="ml-3 btn btn-primary" >Search</button>
</form>





<form class="form-inline" action="{{URL('searchdateapprove')}}" style="padding:20px;" type="get">
@csrf 
<input class="ml-1"type="date" name="search-date">
<button type="submit"   style="color:black;"class="ml-3 btn btn-primary" >Search date</button>
</form>


<a class="ml-3 btn btn-success" href="{{URL('approvedview')}}">Refresh</a>



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
      <th scope="col">Patient issue</th>
      <th scope="col">Approval status</th>
      <th scope="col">Completed status</th>
      <th scope="col">Created at</th>
     

      <th scope="col">Approve</th>
      <th scope="col">Reject</th>
      <th scope="col">Delete</th>
      <th scope="col">Print pdf</th>
      
      
    </tr>
  </thead>
</tbody>
      @foreach($Apt as $Apt)
      
     
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
      <td>{{$Apt->issue}}</td>
      <td>
      @if($Apt->approval_status == 'approved')
       <span class="badge bg-success"> {{$Apt->approval_status}}</span>
       @elseif($Apt->approval_status == 'rejected')
       <span class="badge bg-danger"> {{$Apt->approval_status}}</span>
       @else
       <span class="badge bg-info"> {{$Apt->approval_status}}</span>
       @endif
    </td>
    <td>
    @if($Apt->completed == 'Yes')
       <span class="badge bg-primary">{{$Apt->completed}}</span>
       @elseif($Apt->completed == 'Cancelled')
       <span class="badge bg-danger">{{$Apt->completed}}</span>
       @else
       <span class="badge bg-info"> {{$Apt->completed}}</span>
       @endif
    </td>
      <td>{{$Apt->created_at}}</td>
     
     
     
      @if($Apt->completed == 'Yes')
   
      <td> <a href="{{URL('diagnosis',$Apt->id )}}" class="m-1 btn btn-outline-primary">Write diagnosis </a></td>
      <td> <a href="{{URL('diagnosisview',$Apt->id )}}" class="m-1 btn btn-info">View diagnosis </a></td>
      <td> <a href="{{URL('editdiagnosisview',$Apt->id )}}" class="m-1 btn btn-success">Edit diagnosis </a></td>
      <td> <a href="{{URL('diagnosispdf',$Apt->id )}}" class="m-1 btn btn-warning">Print diagnosis </a></td>
      <td> <a href="{{URL('deleteapprove',$Apt->id )}}" class="m-1 btn btn-danger">Delete</a></td>
      @elseif($Apt->completed == 'pending')
      <td> <a href="{{URL('completed',$Apt->id )}}" class="m-1 btn btn-success">Completed</a></td>
      <td> <a href="{{URL('cancelled',$Apt->id )}}" class="m-1 btn btn-warning">Cancelled</a></td>
      <td> <a href="{{URL('deleteapprove',$Apt->id )}}" class="m-1 btn btn-danger">Delete</a></td>
      @else($Apt->completed == 'Cancelled')
   
      <td> <a href="{{URL('deleteapprove',$Apt->id )}}" class="m-1 btn btn-danger">Delete</a></td>
      @endif

     

</td>


<div>
    </tr>
    
 
    @endforeach 
</table>
</div>









</div>