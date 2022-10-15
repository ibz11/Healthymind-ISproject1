<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{URL('/')}}">Healthymind/<i>Blog</i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{URL('/')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{URL('blog')}}">Blog</a></li>
                
                            @if (Route::has('login'))
                            @auth
                            <x-app-layout>
                                
                            </x-app-layout>
                   
                        
                    @else
                    <li style="margin-right:10px;color:black;"class="nav-item pt-2  "><a class="nav-link badge bg-info " href="{{URL('login')}}">Login</a></li>
                      

                        @if (Route::has('register'))
                        <li class="nav-item pt-2 mr-2 text-dark"><a class="nav-link badge bg-primary" href="{{URL('register')}}">Register</a></li>
                        @endif
                    @endauth
              
            @endif
                        </ul>
                    </div>
                </div>
            </nav>
</main>

<header class="mb-4">
    <!---This is for displaying messages--->
@if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="close" data-dismiss="alert">x</button>
   {{session()->get('message')}}
</div>
@endif
<!---This is for displaying errors--->
   @if ($errors->any())
    <div class="w-4/5 m-auto">
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
</div>
    </div>
@endif
@if (isset(Auth::user()->id) && Auth::user()->id == $posts->user_id)
<h1 style="font-size:40px;" class="fw-bolder m-5 ml-5 mb-5">Edit your Post!</h1>
@else
<h1 style="font-size:40px;" class="fw-bolder m-5 ml-5 mb-5">Editor: You can Edit Post!</h1>
@endif
</header>
</main>
<div  class="m-5">
<form action="/blog/{{$posts->slug}}" method="POST" id="editform" enctype="multipart/form-data">
@csrf  
@method('PUT')


    <div  class="mb-3">
    @if (isset(Auth::user()->id) && Auth::user()->id == $posts->user_id)
    <label for="pwd" class="form-label">Username</label>
    <input   type="text" class="form-control w-50" id="name"  value="{{$posts->user_name}}"name="user_name">
    @else
    <label for="pwd" class="form-label">Username</label></br>
    <label for=""class="text-muted">Nb:You can't change the name since you are not the creator of this </label>
    <input  readonly type="text" class="form-control w-50" id="name"  value="{{$posts->user_name}}"name="user_name">
    @endif
</div>

<div class="mb-3">
    <label for="pwd" class="form-label">Title</label>
    <input   type="text" class="form-control w-50" id="name"  value="{{$posts->title}}"name="title">
</div>
<div class="mb-3">
    <label for="pwd" class="form-label">Description</label>
    <h5 class=" mb-3 text-muted">Nb:Over here you can write a short snippet of what your blog is about</h5>
    <input   type="text" class="form-control w-50" id="name" value="{{$posts->description}}" name="description">
</div>
<div  class="mb-3">
    <label hidden for="pwd" class="form-label">Change Image</label>
    <input hidden disable   type="file" class="form-control w-50" id="name" value="{{asset('images/' . $posts->image) }}" name="image">
    <label for="pwd" class="form-label text-danger">Unfortunalately you can't change Original Image.</br>You have to delete the post to remove the image</label>
<img src="{{asset('images/' . $posts->image) }}" height="300" width="300" alt="original image">
</div>
<div class="mb-3">
    <label for="pwd" class="form-label">Additional links to resources</label>
    <input   type="text" class="m-2 form-control w-50" id="name"   value="{{$posts->URL1}}" placeholder="resource: URL1" name="URL1">
    <input   type="text" class="m-2 form-control w-50" id="name"  value="{{$posts->URL2}}"  placeholder="resource: URL2" name="URL2">
</div>
<label for="pwd" class="m-2 form-label">Category</label>
<select class="form-select w-50" name="category" aria-label="Default select example">
<option value="{{$posts->category}}">Your original choice: {{$posts->category}} </option>
  <option value="Mental Health">Mental health</option>
  <option value="Exercise">Exercise</option>
  <option value="Education">Education</option>  
  <option value="Social">Social </option>
  <option value="General">General</option>
 
</select>

  <div class="m-3">
  
      <textarea name="content" id="" class="form-contol"cols="80" rows="20">
      {{$posts->content}}
      </textarea>
  </div>

<button type="submit" class="text-dark btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>