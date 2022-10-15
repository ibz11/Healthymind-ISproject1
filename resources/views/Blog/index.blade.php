<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HealthyMind</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="Home/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="Home/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{URL('blog')}}">Healthymind/<i>Blog</i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{URL('redirect')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{URL('/blog')}}">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{URL('posts')}}">All Posts</a></li>
                    @if(Auth::check())
                    @if (isset(Auth::user()->role) && Auth::user()->role == 'therapist')
                            <li class="nav-item"><a class="nav-link" href="{{URL('/redirect')}}">My Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{URL('myposts')}}">My Posts</a></li>

                    @endif
                    @if (isset(Auth::user()->role) && Auth::user()->role == 'editor')
                    <li class="nav-item"><a class="nav-link" href="{{URL('/redirect')}}">My Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{URL('myposts')}}">My Posts</a></li>
                    @endif
                    @endif
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
            <!-- Page Content-->
            <section class="py-5">
         
            
          
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">The blog!</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">Blog</div>
                                        <div class="h2 fw-bolder">Hello! Welcome to our Blog</div>
                                        <p>Here you can read all posts made by our therapists to educate you on mental health</p>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog" style="background-image: url('https://images.unsplash.com/photo-1484522676511-0f51cc572bb0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80')"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <section class="py-5">
            <!--<div  class="mb-5"style="display:flex;justify-content:center;align-items:center;">-->


                <div class="container px-5">
                    <h2 class="fw-bolder fs-5 mb-4">Featured Stories</h2>
                    @if(method_exists($posts,'links'))
        <div class="m-2 d-flex justify-content-center">
           {!! $posts->links()!!}
</div>
@endif
                    @if(Auth::check())
                    @if (isset(Auth::user()->role) && Auth::user()->role == 'therapist')
                    <a href="/blog/create" class="mb-3 btn btn-dark">Create Post</a>
                    @endif
                    @if (isset(Auth::user()->role) && Auth::user()->role == 'editor')
                    <a href="/blog/create" class="mb-3 btn btn-dark">Create Post</a>
                    @endif
                    @endif
                    
                    
                    
                    <div class="row gx-5">
                    @foreach($posts as $posts)
                        <div class="col-lg-4 mb-5">
                            <div class="card h-0 shadow border-0">
                                <img class="card-img-top" style="height:220px; width:400px;"src="{{asset('images/' . $posts->image) }}" alt="..." />
                                <div class="card-body p-4">
                             
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$posts->category}}</div>
                                    <a class="text-decoration-none " href="/blog/{{ $posts->slug }}">
                                    <div class="h5 card-title mb-3">{{$posts->title}}</div></a>
                                    <p class="card-text mb-0">{{$posts->description}}</p>
                                    <div class="text-end mb-5 mb-xl-0">
                        <a class="text-decoration-none text-primary" href="/blog/{{ $posts->slug}}">
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
                                                @if ($posts->role == 'editor')
    <div class="fw-bold badge bg-danger">{{$posts->role}}</div>
    @elseif($posts->role == 'user')
    <div class="fw-bold badge bg-warning">{{$posts->role}}</div>
    @elseif($posts->role == 'therapist')
    <div class="fw-bold badge bg-info">{{$posts->role}}</div>
    @else
    
    <div class="fw-bold badge bg-secondary">{{$posts->role}}</div>
   @endif
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

                    <div class="text-end mb-5 mb-xl-0">
                        <a class="text-decoration-none" href="{{URL('posts')}}">
                            More posts
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Healthymind 2022</div></div>
                    <div class="col-auto">
                    @if(Auth::check())
                    <a class="link-light small" href="{{URL('redirect')}}">Home</a>
                    @else
                        <a class="link-light small" href="{{URL('/')}}">Home</a>
                        @endif
                        
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
