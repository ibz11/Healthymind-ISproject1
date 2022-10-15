@include('Admin.topsidebarnav')
                <div class="pl-3 content" style="height:200vh;">
                  
    

                    @if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="close" data-dismiss="alert">x</button>
   {{session()->get('message')}}
</div>
   @endif


    
 

<h1 style="color:blue;font-size:30px;"><strong>Add User to Therapist Table</strong></h1>

<form action="{{URL('addtherapist',$user->id)}}" method="POST" id="editform" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
    <label for="email" class="form-label">User Id</label>
    <input type="text" class="form-control w-50" id="therapist_id" value="{{$user->id}}" name="therapist_id">
  </div>
<div class="mb-3 mt-3">
    <label for="email" class="form-label">Name</label>
    <input type="text" class="form-control w-50" id="name" value="{{$user->name}}" name="name">
  </div>

  <div class="mb-3 mt-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control w-50" id="phone" value="{{$user->phone}}"  name="phone">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control w-50" id="email" value="sdfghjk"  name="email">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Role</label>
    <select class="form-select w-50" name="therapistrole" disabled aria-label="Default select example">
  
  <option value="therapist">therapist</option>
  <option value="{{$user->role}}">{{$user->role}}</option>
  <option value="admin">admin</option>
  <option value="editor">editor</option>
  <option value="user">user</option>
 
</select>
  </div>
  <button type= "submit" style="color:black;"class="mt-1 btn btn-danger">Submit
    </button>

    
      
</form>  

</div>
      
</body>

        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/Admin/js/scripts.js"></script>
</html>