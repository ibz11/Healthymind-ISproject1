@include('Therapist.nav')
@if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="close" data-dismiss="alert">x</button>
   {{session()->get('message')}}
</div>
   @endif
<div class=" mt-3 container-fluid">
<form action="{{URL('transfer',$Apt->id)}}" method="POST" id="editform"enctype="multipart/form-data">
    @csrf
  
    <h1 class="mt-4 text-2xl"><strong>Send data to approved appoitment</strong></h1>  
   
    <div  hidden class="mb-3 mt-3">
    <label for="email" class="form-label">Therapist_id</label>
    
    <input readonly type="text" class="form-control w-50" id="name" value="{{$Apt->therapist_id}}" name="therapist_id" >
  </div>
  <div hidden  class="mb-3 mt-3">
    <label for="email" class="form-label">Therapist First Name</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$Apt->therapist_name}}" name="fname" >
  </div>
  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">Therapist Last Name</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$Apt->lname}}" name="lname" >
  </div>

  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">User id</label>
  
    <input readonly type="text" class="form-control w-50" id="email" value="{{$Apt->user_id}}"  name="user_id" required>
  </div>

  <div  hidden class="mb-3 mt-3">
    <label for="email" class="form-label">User_name</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$Apt->user_name}}" name="user_name" >
  </div>

  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">Venue</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$Apt->location}}" name="location" >
  </div>
  <div hidden  class="mb-3 mt-3">
    <label for="email" class="form-label">Approval_status</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$Apt->Approval_status}}" name="approval_status" >
  </div>
  
  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">Date</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$Apt->date}}" name="date" >
  </div>
  
  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">Time in</label>

    <input readonly type="text" class="form-control w-50" id="email" value="{{$Apt->time_in}}" name="time_in" required>
  </div>


  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">Time out</label>
   
    <input  readonly type="text" class="form-control w-50" id="email" value="{{$Apt->time_out}}"  name="time_out" required>
  </div>
  <div  hidden class="mb-0 mt-3">
    <label for="email" class="form-label">Issue of the patient</label>
</div>
  <div hidden class="mb-3 mt-3">
    <textarea readonly name="issue"  cols="30" rows="10">
{{$Apt->issue}}
  </textarea>
  </div>
 

  <div class="mb-3 mt-3">
    <button class="text-danger btn btn-danger"type="submit">Send to approved table</button>
</div>
</form>
                    
                </div>




</div>