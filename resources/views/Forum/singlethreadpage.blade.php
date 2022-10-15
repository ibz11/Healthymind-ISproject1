<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Thread</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{URL('forum')}}"><i><strong>Healthy Mind</strong></i>/Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        @if(isset(Auth::user()->role) && Auth::user()->role == 'therapist')
        <a class="nav-link active" aria-current="page" href="{{URL('redirect')}}">Home</a>
         
                    @elseif(isset(Auth::user()->role) && Auth::user()->role == 'editor')
                    <a class="nav-link active" aria-current="page" href="{{URL('redirect')}}">Home</a>
            @else    
          <a class="nav-link active" aria-current="page" href="{{URL('/')}}">Home</a>
          @endif
        </li>
       <!-- <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>-->
       
      </ul>
      
      @if (Route::has('login'))
                            @auth
                            <x-app-layout>
                                
                            </x-app-layout>
                   
                        
                    @else
                    <li style="margin-right:10px;color:white;"class="nav-item pt-2  "><a class="nav-link badge bg-info " href="{{URL('login')}}">Login</a></li>
                      

                        @if (Route::has('register'))
                        <li class="nav-item pt-2 mr-2"><a class="nav-link badge bg-primary" href="{{URL('register')}}">Register</a></li>
                        @endif
                    @endauth
              
            @endif
    </div>
  </div>
</nav>
<div class="mt-4 p-5 bg-secondary text-white rounded">
  <h1>Check out the Posts under this thread.</h1>
  
</div>

<section class="categories pt-5">
<div  class="mb-5"style="display:flex;justify-content:center;align-items:center;">
<form class="form-inline" action="{{URL('searchpost',$thread->id)}}" style="padding:20px;" type="get">
@csrf 
<input type="search" placeholder="Search Posts by title, author and usertype "name="post">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search</button>
</form>
@if(Auth::check())
<div  style="display:flex;justify-content:flex-end;">
<a href="{{URL('createpostview',$thread->id)}}" class="btn btn-success">Create Post</a>
</div>
@endif
</div>
<div class="row">
@foreach($post as $post)
@if ($thread->id == $post->thread_id)
<div class="col-sm-6">
<div class="card ">
  <div class="card-body">
    <h4 class="card-title">{{$post->post_name}}</h4>
    @if ($post->role == 'editor')
    <span class="badge bg-danger">{{$post->role}}</span>
    @elseif($post->role == 'user')
    <span class="badge bg-warning">{{$post->role}}</span>
    @elseif($post->role == 'therapist')
    <span class="badge bg-primary">{{$post->role}}</span>
    @else
    <span class="badge bg-secondary">{{$post->role}}</span>
   @endif
   <h4 class="text-muted">Created by {{$post->user_name}}</h4>
    <p class="mt-3 card-text"><i>" {{$post->Description}} "</i></p>
    <div class="d-flex">
  
    <a href="{{URL('posts',$post->id)}}" class="m-1 btn btn-primary">View</a>
    
    @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
    <div class="">
    <a href="{{URL('updatethreadview',$thread->id)}}" class="m-1 btn btn-success">Edit </a> 
    <a href="{{URL('')}}" class="m-1 btn btn-danger">Delete </a>
   </div>
   @elseif(isset(Auth::user()->role) && Auth::user()->role == 'editor')
   <a href="{{URL('updatepostview',$post->id)}}" class="m-1 btn btn-success">Edit for editor </a>
    <a href="{{URL('deletepost',$thread->id)}}"class="m-1 btn btn-danger">Delete for editor </a>
    @endif
    </div>
    
  </div>
</div>
</div>
@endif
@endforeach





</div>


</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>