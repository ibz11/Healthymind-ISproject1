@include('home.nav')
<div class=" mt-3 container-fluid">

<form action="{{URL('updateApt',$Apt->id)}}"c method="POST" id="editform"enctype="multipart/form-data">
    @csrf
  
    <h1 class="mt-4 text-2xl"><strong>Update your appointment</strong></h1>  
   
  <div  class="mb-3 mt-3">
    
 
  
  
  <div class="mb-3 mt-3">
  <p class="text-danger">Nb: Time in and time out should be less than or equal to 2 hours</p>
</div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Time in</label>

    <p class="text-danger">Nb:Write in am pm format</p>
    <input type="text" class="form-control w-50" id="email" value="{{$Apt->time_in}}" name="time_in" required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Time out</label>
    <p class="text-danger">Nb:Write in am pm format</p>
    <input type="text" class="form-control w-50" id="email" value="{{$Apt->time_out}}"  name="time_out" required>
  </div>
  <div class="mb-0 mt-3">
    <label for="email" class="form-label">Issue that I am dealing with</label>
</div>
  <div class="mb-3 mt-3">
    <textarea name="issue"  cols="30" rows="10">
{{$Apt->issue}}
  </textarea>
  </div>
  <div class="mb-0 mt-3">
    <label for="email" class="form-label">Venue</label>
</div>
<div class="mb-3 mt-3">
    <select id="qualifications"   class="block mt-1 w-50" name="location" >
    <option value="{{$Apt->location}}" >
         My current option- {{$Apt->location}} 
           </option>
    <option value="Online" >
             Online
           </option>
           <option value="{{$Apt->location}}" >
          {{$Apt->location}} 
           </option>
         
         
           
          
</select>
</div>
  <div class="mb-3 mt-3">
    <button class="text-danger btn btn-danger"type="submit">Update</button>
</div>
</form>
                    
                </div>























</div>
</body>
</html>