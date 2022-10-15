@include('Therapist.nav')
<div class=" mt-3 container-fluid">
<div class="table-responsive">
<table class=" table table-sm">

    <div class="text-center"><h2 style="font-size:20px;" class="mb-1"> Appointments made by users </h2></div>
    <form class="form-inline" action="{{URL('searchapttherapist')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" placeholder="Search Appointments by therapist name,lastname,status, date and location "name="search">

<button type="submit"   style="color:black;"class="ml-3 btn btn-primary" >Search</button>
</form>





<form class="form-inline" action="{{URL('searchdatetherapist')}}" style="padding:20px;" type="get">
@csrf 
<input class="ml-1"type="date" name="search-date">
<button type="submit"   style="color:black;"class="ml-3 btn btn-primary" >Search date</button>
</form>


<a class="ml-3 btn btn-success" href="{{URL('pending')}}">Refresh</a>



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
     

      <th scope="col">View</th>
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
      <td>
      @if($Apt->Approval_status == 'approved')
       <span class="badge bg-success"> {{$Apt->Approval_status}}</span>
       @elseif($Apt->Approval_status == 'rejected')
       <span class="badge bg-danger"> {{$Apt->Approval_status}}</span>
       @else
       <span class="badge bg-info"> {{$Apt->Approval_status}}</span>
       @endif
    </td>
      <td>{{$Apt->created_at}}</td>
     
     
      <td> <a href="{{URL('viewApt',$Apt->id )}}" class="m-1 btn btn-primary">View</a></td>
      @if($Apt->Approval_status == 'approved')
      
      <td> <a href="{{URL('reject',$Apt->id )}}" class="m-1 btn btn-warning">Reject</a></td>
      <td> <a href="{{URL('transferview',$Apt->id )}}" class="m-1 btn btn-dark">Transfer</a></td>
      @elseif($Apt->Approval_status == 'pending')
      <td> <a href="{{URL('approve',$Apt->id )}}" class="m-1 btn btn-success">Approve</a></td>
      <td> <a href="{{URL('reject',$Apt->id )}}" class="m-1 btn btn-warning">Reject</a></td>
      @else($Apt->Approval_status == 'rejected')
      <td> <a href="{{URL('approve',$Apt->id )}}" class="m-1 btn btn-success">Approve</a></td>
      @endif

     
       @if($Apt->Approval_status == 'approved')
      <td> <a href="{{URL('Aptpdf',$Apt->id )}}" class="m-1 btn btn-info">Print pdf</a></td>
     @endif

</td>


<div>
    </tr>
    
 
    @endforeach 
</table>
</div>









</div>