<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="">Healthymind/<i>Blog</i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      
                            <li class="nav-item"><a class="nav-link" href="{{URL('/blog')}}">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{URL('posts')}}">Posts</a></li>
                
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
<h1 style="font-size:40px;"class="fw-bolder m-5 ml-5 mb-5">Check out all the posts!</h1>
</header>
<div  style="">
<form class="form-inline" action="{{URL('searchallposts')}}" style="padding:20px;" type="get">
@csrf 
<input type="search"class="search" placeholder="Search categories"name="search">
<button type="submit"   style="color:black;"class="ml-2 btn btn-info"  >Search</button>
</form>

<!--<div  style="display:flex;justify-content:flex-end;">-->

</div>
<div class="container px-5">
@if(method_exists($posts,'links'))
        <div class="m-2 d-flex justify-content-center">
           {!! $posts->links()!!}
</div>
@endif
                    @if(Auth::check())
                    <a href="/blog/create" class="mb-3 btn btn-dark">Create Post</a>
                    @endif
                    
<div class="row gx-5">
    @foreach($posts as $posts)
                        <div class="col-lg-4 mb-5">
                       
                            <div class="card h-40 shadow border-0">
                                <img class="card-img-top"style="height:220px; width:400px;" src="{{asset('images/' . $posts->image) }}" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$posts->category}}</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="/blog/{{$posts->slug}}">
                                    <div class="h5 card-title mb-3">{{$posts->title}}</div></a>
                                    <p class="card-text mb-0">{{$posts->description}}</p>
                                    <div class="text-end mb-5 mb-xl-0">
                        <a class="text-decoration-none" href="/blog/{{$posts->slug}}">
                            Keep reading
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">{{$posts->user_name}}</div>
                                                <div class="fw-bold badge bg-info">{{$posts->role}}</div>
                                                <div class="text-muted">{{$posts->created_at->format('d M Y')}} &middot; time created {{$posts->created_at->format('h:m:s')}}</div>
                                            </div>
                                            
                                        </div>
                                        <!---Delete and update--->
                                        @if (isset(Auth::user()->id) && Auth::user()->id == $posts->user_id)
                                       <!-- <form action="" method="" >-->
                                       <a href="/blog/{{$posts->slug}}/edit" class="badge bg-success">Edit</a>
                                  
                                    
                                        <form action="/blog/{{$posts->slug}}" method="POST" >
                                        @csrf
                                   @method('delete')
                                        <button type="submit" class="ml-3 badge bg-danger">Delete</button>
                                     </form>
                                     @endif
                                    </div>
                                    @if (isset(Auth::user()->role) && Auth::user()->role == 'editor')
                                     <a href="/blog/{{$posts->slug}}/edit" class="m-2 badge bg-success">Edit for editor</a>
                                  
                                    
                                  <form action="/blog/{{$posts->slug}}" method="POST" >
                                  @csrf
                             @method('delete')
                                  <button type="submit" class="ml-3 badge bg-danger">Delete for Editor</button>
                               </form>
                                     @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>