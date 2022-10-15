@include('Editor.nav')
                <div class="container-fluid">
                    <div class="text-center mt-5">
                    <h1 style="font-size:40px;"><strong>Hello! <i>{{(Auth::user()->name)}}</i>.Welcome to the Editor's dashboard</strong></h1>
                    </div>
<div class="row mt-5">
    <h2 style="font-size:30px;" class="mb-5">Forum Analytics</h2>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">No of Categories</h5>
        <p class="text-2xl text-primary card-text">{{$category}}</p>
        <a href="{{URL('forumdata')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 ">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">No of threads</h5>
        <p class="text-2xl text-primary card-text">{{$thread}}</p>
        <a href="{{URL('forumdata')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of posts </h5>
        <p class="text-2xl text-primary card-text">{{$post}}</p>
        <a href="{{URL('forumdata')}}" class="btn btn-info">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Number of replies </h5>
        <p class="text-2xl text-primary card-text">{{$reply}}</p>
        <a href="{{URL('forumdata')}}" class="btn btn-info">View</a>
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
        <a href="{{URL('blogdata')}}" class="btn btn-info">View</a>
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