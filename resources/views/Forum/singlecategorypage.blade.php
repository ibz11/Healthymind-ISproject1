<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Category</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{URL('category',$category->id)}}"><i><strong>Healthy Mind</strong></i>/Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('forum')}}">Home</a>
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
<div class="mt-4 p-5 bg-info text-white rounded">
  <h1 style="font-size:30px;">Hello user! Check out the <strong>Threads</strong> under this category</h1>
  <h3 class="text-dark">Note:  A thread is a subdivision of  category in a forum</h3>
</div>

<section class="categories pt-5">
<div  class="mb-5"style="display:flex;justify-content:center;align-items:center;">
@if(Auth::check())
<div  style="display:flex;justify-content:flex-end;">
<a href="{{URL('createthreadview', $category->id)}}" class="btn btn-success">Create Thread</a>
</div>
@endif
<form class="form-inline" action="{{URL('searchthread',$category->id)}}" style="padding:20px;" type="get">

@csrf 
<input type="search" placeholder="Search threads"name="thread">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search</button>
</form>

</div>
<div class="row">

@foreach($thread as $thread)
@if ($category->id == $thread->category_id)
<div class=" col-sm-4">
<div class="card ">
  <div class="card-body">
    <h4 class="card-title">{{$thread->thread_name}}</h4>

    @if ($thread->role == 'editor')
    <span class="badge bg-danger">{{$thread->role}}</span>
    @elseif($thread->role == 'user')
    <span class="badge bg-warning">{{$thread->role}}</span>
    @elseif($thread->role == 'therapist')
    <span class="badge bg-primary">{{$thread->role}}</span>
    @else
    <span class="badge bg-secondary">{{$thread->role}}</span>
   @endif


    <p class="card-text text-muted">Created by {{$thread->user_name}} </p>
    <p class="card-text text-muted"> {{$thread->description}} </p>
    <p class="card-text">Created on {{$thread->created_at->format('d M Y')}} </p>
    <div class="d-flex">
    <a href="{{URL('thread',$thread->id)}}" class="m-1 btn btn-primary">View</a>

    @if(isset(Auth::user()->id) && Auth::user()->id == $thread->user_id )
    <a href="{{URL('updatethreadview',$thread->id)}}" class="m-1 btn btn-success">Edit</a>
    <a href="{{URL('deletethread',$thread->id)}}" class="m-1 btn btn-danger">Delete</a>

    @elseif(isset(Auth::user()->role) && Auth::user()->role == 'editor' )
    <a href="{{URL('updatethreadview',$thread->id)}}" class="m-1 btn btn-success">Edit for editor</a>
    <a href="{{URL('deletethread',$thread->id)}}" class="m-1 btn btn-danger">Delete for editor</a>
    @endif

    
    
    </div>
 
  </div>
</div>
</div>
@endif
@endforeach


</div>


</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>