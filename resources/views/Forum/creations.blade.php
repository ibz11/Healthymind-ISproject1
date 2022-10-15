<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Creations</title>
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
          <a class="nav-link active" aria-current="page" href="{{URL('forum')}}">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('redirect')}}">My dashboard</a>
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

<a href="#categories" class="btn btn-success">Categories</a>
<a href="#threads" class="btn btn-success">Threads</a>
<a href="#posts" class="btn btn-success">Posts</a>
<a href="#replies" class="btn btn-success">Replies</a>

<!------Categories------->
<section  style=""class="mt-5 mb-5"id="categories">
<h1 style="font-size:30px;">My Categories</h1>
@if(method_exists($category,'links'))
        <div class="m-2 d-flex justify-content-center">
           {!! $category->links()!!}
</div>
@endif
<table class="m-4 table">
<div class="text-center"><h2 style="font-size:30px;" class="mb-1">My Categories</h2></div>

<thead>
    <tr>
      <th scope="col">Category id</th>
      <th scope="col">User Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Created at</th>

      <th scope="col">View</th>
       <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($category as $category)
      @if (isset(Auth::user()->id) && Auth::user()->id == $category->user_id)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->user_name}}</td>
      <td>{{$category->category_name}}</td>
      <td>{{$category->created_at}}</td>


      <td> <a href="{{URL('category',$category->id)}}" class="m-1 btn btn-primary">View</a></td>

      <td><a href="{{URL('deletecategory',$category->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatecategoryview', $category->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
@endif
@endforeach
</table>
</section>      



<!------My threads-------->

<section class="mt-5 h-100" id="threads">
 <table class=" m-4 table">

    <div class="text-center"><h2 style="font-size:30px;" class="mb-1">MY Threads</h2></div>
   
    @if(method_exists($thread,'links'))
   
<div class="d-flex justify-content-center">
  {!! $thread->links()!!} 
</div>
@endif

  <thead>
    <tr>
      <th scope="col">Thread id</th>
      <th scope="col">User Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Thread Name</th>
      <th scope="col">Created at</th>
      
      <th scope="col">View</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($thread as $thread)
      @if (isset(Auth::user()->id) && Auth::user()->id == $thread->user_id)
    <tr>
      <th scope="row">{{$thread->id}}</th>
      <td>{{$thread->user_name}}</td>
      <td>{{$thread->category_name}}</td>
      <td>{{$thread->thread_name}}</td>
      <td>{{$thread->created_at}}</td>
      
     <td> <a href="{{URL('thread',$thread->id)}}" class="m-1 btn btn-primary">View</a></td>
      
      <td><a href="{{URL('deletethread',$thread->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatethreadview', $thread->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endif
    @endforeach
</section> 
 <!----End of Threads--->


<!---Posts------>
<section class="mt-5 h-100"id="posts">
<table class="m-4 table">
    <div class="text-center"><h2 style="font-size:30px;" class="mb-1"> My Posts</h2></div>
    @if(method_exists($post,'links'))
        <div class="m-2 d-flex justify-content-center">
           {!! $post->links()!!}
</div>
@endif
<thead>
    <tr>
      <th scope="col">Post id</th>
      <th scope="col">User Name</th>
      <th scope="col">Post Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Thread Name</th>
      <th scope="col">Created at</th>
     

      <th scope="col">View</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
</tbody>
      @foreach($post as $post)
      @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->user_name}}</td>
      <td>{{$post->post_name}}</td>
      <td>{{$post->category_name}}</td>
      <td>{{$post->thread_name}}</td>
      <td>{{$post->created_at}}</td>

     
      <td> <a href="{{URL('posts', $post->id)}}" class="m-1 btn btn-primary">View</a></td>

      <td><a href="{{URL('deletepost',$post->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatepostview', $post->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endif
    @endforeach 
</table>
</section>
<!------End of posts------>

<!---Replies----->
<section style="height:100vh;"class="mt-5"id="replies">
<table class="m-4 table">
    <div class="text-center"><h2 style="font-size:30px;" class="mb-1"> My Replies</h2></div>
    @if(method_exists($reply,'links'))
        <div class="m-2 d-flex justify-content-center">
           {!! $reply->links()!!}
</div>
@endif
<thead>
    <tr>
      <th scope="col">Reply id</th>
      <th scope="col">User Name</th>
      <th scope="col">Reply</th>
     
      <th scope="col">Created at</th>
  

      
     
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
</tbody>
      @foreach($reply as $reply)
      @if (isset(Auth::user()->id) && Auth::user()->id == $reply->user_id)
    <tr>
      <th scope="row">{{$reply->id}}</th>
      <td>{{$reply->user_name}}</td>
      <td>{{$reply->reply}}</td>
      <td>{{$reply->created_at}}</td>
    
      
     
      <td> <a href="{{URL('posts', $reply->post_id)}}" class="m-1 btn btn-primary">View</a></td>
      <td><a href="{{URL('deletereply',$reply->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatereplyview', $reply->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endif
    @endforeach 
</table>
</section>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>