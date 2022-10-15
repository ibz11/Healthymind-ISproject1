<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!---Icons-->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Posts</title>
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
          <a class="nav-link active" aria-current="page" href="{{URL('/')}}">Forum</a>
        </li>
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('creations')}}">My creations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('redirect')}}">My dashboard</a>
        </li>
        @endif
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


<section style="background-color: #ad655f;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card text-dark">
          <div class="card-body p-4">
            <h3 style="font-size:30px;"class="mb-0"><strong>Post-section</strong></h3>
        
            @foreach($post as $post)
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="/icon/avatar.png" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">{{$post->user_name}}</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                  Created at {{$post->created_at->format('d M Y')}} 
                    
                    @if ($post->role == 'editor')
   
   <span class="small badge bg-danger">{{$post->role}}</span>
   @elseif($post->role == 'user')
  
   <span class="small badge bg-warning">{{$post->role}}</span>
   @elseif($post->role == 'therapist')
   
   <span class="small badge bg-info">{{$post->role}}</span>
   @else
 
 <span class="small badge bg-secondary">
     {{$post->role}}</span>
  @endif 
                  </p>
                  @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id )
                  <a href="{{URL('updatepostview',$post->id)}}" class="ml-3 badge bg-success link-muted"><i class="fas fa-pencil-alt ms-2"></i>Edit post</a>
                  <a href="{{URL('deletepost',$post->id)}}" class="ml-3 badge bg-danger link-muted">Delete</a>
                  @elseif(isset(Auth::user()->role) && Auth::user()->role == 'editor' )
                  <a href="{{URL('updatepostview',$post->id)}}" class="ml-3 badge bg-success link-muted">Edit for editor</a>
                  <a href="{{URL('deletepost',$post->id)}}" class="ml-3 badge bg-danger link-muted">Delete for editor</a>
                  @endif
                  @if (isset(Auth::user()->role) && Auth::user()->role == 'editor')
                 
                  @endif
                  
                </div>
                
                <p class=" mb-0">
                       {{$post->content}} 
                      </p>
                      @if(Auth::check())
                      <a href="{{URL('createreplyview',$post->id)}}" style="color:blue; font-size:20px;"><i style="color:blue;"class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                    @endif
                
              </div>
              @endforeach
            </div>
          </div>

          <hr class="my-0" />
          <h3 style="font-size:30px;"class="mb-0"><strong>Replies</strong></h3>
          @foreach($reply as $reply)
             @if ($post->id == $reply->post_id)
          <div class="card-body p-4">
          
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="/icon/avatar.png" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">{{$reply->user_name}}</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                Created at {{$reply->created_at->format('d M Y')}} 
                @if ($reply->role == 'editor')
   
   <span class="small badge bg-danger">{{$reply->role}}</span>
   @elseif($reply->role == 'user')
  
   <span class="small badge bg-warning">{{$reply->role}}</span>
   @elseif($reply->role == 'therapist')
   
   <span class="small badge bg-info">{{$reply->role}}</span>
   @else
   @endif
                  </p>
                  @if (isset(Auth::user()->id) && Auth::user()->id == $reply->user_id )
                  <a href="{{URL('updatereplyview',$reply->id)}}" class="ml-3 badge bg-success link-muted"><i class="fas fa-pencil-alt ms-2"></i> Edit </a>
                  <a href="{{URL('deletereply',$reply->id)}}" class="ml-3 badge bg-danger ">Delete </a>
                  @elseif(isset(Auth::user()->role) && Auth::user()->role == 'editor' )
                  <a href="{{URL('updatereplyview',$reply->id)}}" class="ml-3 badge bg-success link-muted"><i class="fas fa-pencil-alt ms-2"></i> Edit for editor</a>
                  <a href="{{URL('deletereply',$reply->id)}}" class="ml-3 badge bg-danger ">Delete for editor</a>
                  @endif
                
                </div>
                <p class="mb-0">
                {{$reply->reply}}
                </p>
              </div>
            
            </div>
          
          </div>
          @endif      
              @endforeach

          
</section>



    

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
