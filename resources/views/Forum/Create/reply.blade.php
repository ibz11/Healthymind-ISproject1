<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create Reply</title>
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
          <a class="nav-link active" aria-current="page" href="{{URL('forum')}}">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{URL('redirect')}}">My dashboard</a>
        </li>
       
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
@if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="btn-close" aria-label="Close"  data-dismiss="alert"></button>
   {{session()->get('message')}}
</div>
   @endif
<a class="btn btn-warning" href="{{URL('posts',$post->id)}}">Back</a>
<h1 class="mt-4 text-2xl"><strong>Create Reply</strong></h1>
<form action="{{URL('createreply')}}" method="POST" id="editform" enctype="multipart/form-data">
    @csrf

<div hidden class="mb-3">
    <label for="pwd" class="form-label">Post_Id</label>
    <input  readonly type="text" class="form-control w-50" id="name" value="{{$post->id}}" name="post_id">
</div>

<div class="mb-3">
<label for="pwd" class="form-label">Reply</label>
</div>
<div class="mb-3">
  
  <textarea name="reply"  cols="30" rows="10">

  </textarea>
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