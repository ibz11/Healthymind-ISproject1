@include('Therapist.nav')
<div class="container-fluid">
@if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="close" data-dismiss="alert">x</button>
   {{session()->get('message')}}
</div>
   @endif


    
 <form action="{{URL('updateprofile',$therapist->id)}}" method="POST" id="editform"enctype="multipart/form-data">
    @csrf
  
    <h1 class="mt-4 text-2xl"><strong>Update Your profile</strong></h1>  
    <p class="text-danger">Note: this <strong>Updated</strong> profile will be displayed to  the homepage for the user to see </p>
  <div  class="mb-3 mt-3">
    <label for="email" class="form-label">First Name</label>
    
    <input type="text" class="form-control w-50" id="name" value="{{$therapist->fname}}" name="fname" required>
  </div>
  <div  class="mb-3 mt-3">
    <label for="email" class="form-label">Last Name</label>
    <p class="text-primary">Nb:Type in your last  name </p>
    <input type="text" class="form-control w-50" id="name" value="{{$therapist->lname}}" name="lname" required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control w-50" id="email" value="{{$therapist->email}}"  name="email" required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Phone Number</label>
    <input type="number" class="form-control w-50" id="phone" value="{{$therapist->phone}}"  name="phone" required>
  </div>
  <div class="mb-3 mt-3">
  <label for="email" class="form-label">Qualification</label>
  <select id="qualifications"   class="block mt-1 w-50" name="qualification" >
  <option value="{{$therapist->qualification}}" >
            My current option: {{$therapist->qualification}}
           </option>
  <option value="Degree" >
             Degree
           </option>
         <option value="Masters" >
               Masters
           </option>
         
           <option value="Phd" >
               Phd
         </option>
           
</select>
</div>
<div class="mb-3 mt-3">
    <label for="email" class="form-label">Your current profile Image</label>
    <img src="/therapists/{{$therapist->image}}" alt="Admin" class="rounded-circle" width="150">
</div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Update Image</label>
    <input type="file" class="form-control w-50" id="phone" value=""  name="file" >
  </div>
  <div class="mb-3">
  <label for="email" class="form-label">University</label>
  <p class="text-primary">Nb:This is where you type the university you went to</p>
    <input type="text" class="form-control w-50" id="location" value="{{$therapist->university}}" name="university" required>
  </div>
  <div class="mb-3">
  <label for="email" class="form-label">Description</label>
  <p class="text-primary">Nb:This is where you give your qualifications and a brief history about yourself </br>and the work you do</p>
    <input type="text" class="form-control w-50" id="description" value="{{$therapist->description}}"  name="description" required>
  </div>
  <div class="mb-3">
  <label for="email" class="form-label">Location of your establishment</label>
  <p class="text-primary">Nb:This is where you offer your service,if its online you could type online</p>
    <input type="text" class="form-control w-50" id="location" value="{{$therapist->location}}" name="location" required>
  </div>
  
  <button type="submit" class="text-dark btn btn-primary">Submit</button>
  

  </form>
</div>
</body>
</html>