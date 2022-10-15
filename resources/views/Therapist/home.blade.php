@include('Therapist.nav')
                <div class="container-fluid">
                    <div class="text-center mt-5">
                    <h1 style="font-size:40px;"><strong>Hello! <i>{{(Auth::user()->name)}}</i>.Welcome to the Therapist's dashboard</strong></h1>
                    </div>
<div class="row mt-5">
    <h2 style="font-size:30px;" class="mb-5"> Analytics</h2>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">No of Posts by Users on the Forum</h5>
        <p class="text-muted">Note:This is where  you can easily interact with user's posts</p>
        <p class="text-2xl text-primary card-text">{{$post}}</p>
        <a href="{{URL('posttherapist')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>
  

  <div class="col-sm-6 ">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">No of pending Appointments</h5>
        <p class="text-2xl text-primary card-text">{{$Apt}}</p>
        <a href="{{URL('pending')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 ">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">No of rejected Appointments</h5>
        <p class="text-2xl text-primary card-text">{{$reject}}</p>
        <a href="{{URL('pending')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of Approved appointments</h5>
        <p class="text-2xl text-primary card-text">{{$Approve}}</p>
        <a href="{{URL('approvedview')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 ">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">No of Online Appointmnets </h5>
        <p class="text-2xl text-primary card-text">{{$online}}</p>
        <a href="{{URL('approvedview')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of Completed appointments</h5>
        <p class="text-2xl text-primary card-text">{{$complete}}</p>
        <a href="{{URL('approvedview')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of Cancelled appointments</h5>
      <p class="text-danger ry card-text">Nb.Where client did not attend</p>
        <p class="text-2xl text-primary card-text">{{$cancelled}}</p>
        <a href="{{URL('approvedview')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>
 



</div>
<div class="row mt-5 ">
<h2 style="font-size:30px;" class="mb-5">Blog Analytics</h2>
<div class=" mb-3 col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of posts on the blog </h5>
        <p class="text-2xl text-primary card-text">{{$posts}}</p>
        <a href="{{URL('blogtherapist')}}" class="btn btn-info">View my posts</a>
      </div>
    </div>
  </div>

  </div>
  

                </div>
                
            </div>
            
        </div>
</div>

</body>
</html>