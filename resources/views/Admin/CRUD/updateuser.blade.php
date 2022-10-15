@include('Admin.topsidebarnav')
                <div class="pl-3 content" style="height:200vh;">
                    <h1 style="font-size:30px;"><strong>Update User</strong></h1>
    

                    @if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="close" data-dismiss="alert">x</button>
   {{session()->get('message')}}
</div>
   @endif


    
 <form action="{{URL('updateusers',$user->id)}}" method="POST" id="editform"enctype="multipart/form-data">
    @csrf
  
    
  <div  class="mb-3 mt-3">
    <label for="email" class="form-label">Name</label>
    <input type="text" class="form-control w-50" id="name" value="{{$user->name}}" name="name">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control w-50" id="email" value="{{$user->email}}"  name="email">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Phone</label>
    <input type="number" class="form-control w-50" id="phone" value="{{$user->phone}}"  name="phone">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Role</label>
    <h4 class="text-muted">Note:If you are updating role it should confirm role with</br>the table sent to your choice.</h4>
    <select class="form-select w-50" name="role" aria-label="Default select example">
  
  <option value="{{$user->role}}">{{$user->role}}</option>
  <option value="admin">admin</option>
  <option value="editor">editor</option>
  <option value="therapist">Therapist</option>
  <option value="therapist">user</option>
 
</select>
  </div>
  
  <button type="submit" class="text-dark btn btn-primary">Submit</button>
  
    
  
  
  




    
      
</form>  

</div>
      
</body>

        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/Admin/js/scripts.js"></script>
</html>