<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update  thread</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i><strong>Healthy Mind</strong></i>/Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('/')}}">Home</a>
        </li>
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{URL('redirect')}}">My Dashboard</a>
        </li>
       @endif
       
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

<div  class="m-5">
 
<a class="btn btn-info" href="{{URL('creations')}}">Back to your creations </a>
<a class="btn btn-primary" href="{{URL('forum')}}">Back to forum page</a>

<h1 class="mt-4 text-2xl"><strong>Update Thread</strong></h1>
<form action="{{URL('updatethread',$thread->id)}}" method="POST" id="editform" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">   
    @if (isset(Auth::user()->id) && Auth::user()->id == $thread->user_id)
<label for="pwd" style="font-size:22px;"class="form-label"><strong>Your name</strong></label></br>
<label for=""class="text-muted">Nb:You can change it for anonimity</label>
<input   type="text" class="form-control w-50" id="name" value="{{$thread->user_name}}" name="user_name">
@else
<label for="pwd" style="font-size:22px;"class="form-label"><strong>User name</strong></label></br>
<label for=""class="text-muted">Nb:You can change the name since you are not the creator of this reply</label>
<input  readonly type="text" class="form-control w-50" id="name" value="{{$thread->user_name}}" name="user_name">
@endif
</div>
<div hidden class="mb-3">
    <label for="pwd" class="form-label">User ID</label>
    <input readonly   type="text" class="form-control w-50" id="name" value="{{$thread->user_id}}" name="user_id">
</div>
<div hidden class="mb-3">
    <label for="pwd" class="form-label">User Name</label>
    <input readonly   type="text" class="form-control w-50" id="name" value="{{$thread->user_name}}" name="user_name">
</div>
<div hidden class="mb-3">
    <label for="pwd" class="form-label">Thread ID</label>
    <input  readonly  type="text" class="form-control w-50" id="name" value="{{$thread->id}}" name="thread_id">
</div>

<div  class="mb-3">
    <label for="pwd" class="form-label">Thread Name</label>
    <input    type="text" class="form-control w-50" id="name" value="{{$thread->thread_name}}" name="thread_name">
</div>
<div hidden class="mb-3">
    <label for="pwd" class="form-label">Category ID</label>
    <input readonly  type="text" class="form-control w-50" id="name" value="{{$thread->category_id}}" name="category_id">
</div>
<div class="mb-3">
    <label for="pwd" class="form-label">Category name</label>
    <input  readonly type="text" class="form-control w-50" id="name" value="{{$thread->category_name}}" name="category_name">
</div>
<div hidden class="mb-3">
    <label for="pwd" class="form-label">Thread Description</label>
    <input readonly   type="text" class="form-control w-50" id="name" value="" name="description">
</div>

<div hidden class="mb-3">
    <label for="pwd" class="form-label">Role</label>
    <input readonly   type="text" class="form-control w-50" id="name" value="{{$thread->role}}" name="role">
</div>



<button type="submit" class="text-dark btn btn-primary">Submit</button>
</form>
</div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>