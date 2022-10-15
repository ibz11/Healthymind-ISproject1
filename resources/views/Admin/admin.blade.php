@include("Admin.topsidebarnav")
                <!-- Page content-->
       
                <div class="container-fluid">
                    <h1 style=" color:blue;font-size:50px;" class="m-4"><strong>Welcome {{Auth::user()->name}} !</strong></h1>
<!---Cards-->


<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">No of logged in users</h5>
        <p class="text-2xl text-primary card-text">{{$sessions}}</p>
        <h6 class="text-muted">Note: these are users that are currently in session</h6>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Registerd users </h5>
        <p class="text-2xl text-primary card-text">{{$users}}</p>
        <a href="{{URL('users')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of  therapists </h5>
        <p class="text-2xl text-primary card-text">{{$therapists}}</p>
        <a href="{{URL('alltherapists')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>


  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of  Therapist's profiles</h5>
        <p class="text-2xl text-primary card-text">{{$profiles}}</p>
        <a href="{{URL('therapistsprofiles')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of Editors </h5>
        <p class="text-2xl text-primary card-text">{{$editors}}</p>
        <a href="{{URL('alleditors')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of Users with the role "User" </h5>
        <p class="text-2xl text-primary card-text">{{$userrole}}</p>
        <a href="{{URL('users')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>
  

</div>

                </div>
                
            </div>
            
        </div>
   
       
    </body>
    
</html>
