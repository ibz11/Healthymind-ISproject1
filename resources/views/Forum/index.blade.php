<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Forum</title>
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
        
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('/redirect')}}">My dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{URL('creations')}}"><strong>My creations</strong></a>
        </li>
        @else 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('/')}}">Home</a>
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
<div class="mt-4 p-5 bg-primary text-white rounded">
  @if(Auth::check())
  <h1 style="font-size:30px;">Hello {{Auth::user()->name}}! Welcome to the forum</h1>
  @else
  <h1 style="font-size:30px;">Hello user! Welcome to the forum</h1>
  @endif

  <h1 style="font-size:30px;"> Check out the <strong>Categories</strong> under this category</h1>
</div>

<section class="categories pt-5">

<div  class="mb-5"style="display:flex;justify-content:center;align-items:center;">
<form class="form-inline" action="{{URL('searchcategory')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" placeholder="Search categories"name="category">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search</button>
</form>
@if(Auth::check())
<div  style="display:flex;justify-content:flex-end;">
<a href="{{URL('createcategoryview')}}" class="btn btn-success">Create Category</a>
</div>
@endif

</div>
</div>


<div class="row">
@foreach($category as $category)
<div class="col-sm-6">
<div class="card ">
  <div class="card-body">
    <h4 class="card-title">{{$category->category_name}}</h4>
    
    @if ($category->role == 'editor')
    <span class="badge bg-danger">{{$category->role}}</span>
    @elseif($category->role == 'user')
    <span class="badge bg-warning">{{$category->role}}</span>
    @elseif($category->role == 'therapist')
    <span class="badge bg-primary">{{$category->role}}</span>
    @else
    <span class="badge bg-secondary">{{$category->role}}</span>
   @endif


    <p class="card-text">Created by {{$category->user_name}}</p>
    <div class="d-flex">
    <a href="{{URL('category',$category->id)}}" class="m-1 btn btn-primary">View</a>
    @if (isset(Auth::user()->id) && Auth::user()->id == $category->user_id )
    <a href="{{URL('updatecategoryview', $category->id)}}" class="m-1 btn btn-success">Edit</a>
    <a href="{{URL('')}}" class="m-1 btn btn-danger">Delete</a>
    @elseif(isset(Auth::user()->role) && Auth::user()->role == 'editor' )
    <a href="{{URL('updatecategoryview',$category->id)}}" class="m-1 badge bg-success">Edit for Editor</a> 
    <a href="{{URL('deletecategory',$category->id)}}" class="m-1 badge bg-danger">Delete for editor</a>
    @endif
    
    </div>
    
  </div>
</div>
</div>
@endforeach



</div>

</section>

   

    <!-- Option 1: Bootstrap Bundle with Popper 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 -->
   
    
  </body>
 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
    </html>