<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Healthymind/blog</title>
</head>
<body>
<main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{URL('/blog')}}">Healthymind/<i>Blog</i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{URL('/')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{URL('/blog')}}">Blog</a></li>
                
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

<div class="ml-5 col-lg-9">
                            <!-- Post content-->
                            @foreach($posts as $posts)
                            <article style="margin-left:2rem;">
                                <!-- Post header-->
                                <header class="m-4">
                                    <!-- Post title-->
                                    <h1 style="font-size:48px;" class="fw-bolder mb-1">{{$posts->title}}</h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2">{{$posts->created_at->format('d M Y')}}</div>
                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$posts->category}}</a>
                                   
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded w-50 h-25 " src="{{asset('images/' . $posts->image) }}" alt="..." /></figure>
                                <!-- Post content-->
                                <section class="mb-5">
                                <h2 class="fw-bolder mb-4 mt-5">{{$posts->description}}</h2>
                                    <p class="fs-5 mb-4">{{$posts->content}}</p>
                                    <!--<p class="fs-5 mb-4">The universe is large and old, and the ingredients for life as we know it are everywhere, so there's no reason to think that Earth would be unique in that regard. Whether of not the life became intelligent is a different question, and we'll see if we find that.</p>
                                    <p class="fs-5 mb-4">If you get asteroids about a kilometer in size, those are large enough and carry enough energy into our system to disrupt transportation, communication, the food chains, and that can be a really bad day on Earth.</p>
                                   
                                    <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
                                    <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p>
-->         <h2 style="font-size:30px;"class="fw-bolder mb-4 mt-5">Additional Resource recomended by author</h2>
            <a class="mb-2 text-primary" href="{{$posts->URL1}}"><u>{{$posts->URL1}}</u></a></br>
            <a class="mt-2 text-primary" href="{{$posts->URL2}}"><u>{{$posts->URL2}}</u></a>
                                </section>
                            </article>
                            @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>