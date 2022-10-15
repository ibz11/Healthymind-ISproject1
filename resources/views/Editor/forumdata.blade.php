@include('Editor.nav')
<div class=" mt-3 container-fluid">
<div class="text-center"></div> 
<div class="text-center"><h2 style="font-size:30px;" class="mb-5">Forum Analytics</h2></div>


   <!----Categories--->
   <section id="categories">
<table class="table">
    <div class="text-center"><h2 style="font-size:30px;" class="mb-1">Categories</h2></div>
    @if(method_exists($category,'links'))
<div class="d-flex justify-content-center">
  {!! $category->links()!!} 
</div>
@endif
  <thead>
    <tr>
      <th scope="col">Category id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Role</th>
      <th scope="col">View</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($category as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->category_name}}</td>
      <td>@if ($category->role == 'editor')
   
   <span class="small badge bg-danger">{{$category->role}}</span>
   @elseif($category->role == 'user')
  
   <span class="small badge bg-warning">{{$category->role}}</span>
   @elseif($category->role == 'therapist')
   
   <span class="small badge bg-info">{{$category->role}}</span>
   @else
 
 <span class="small badge bg-secondary">
     {{$category->role}}</span>
  @endif 
</td>
<td> <a href="{{URL('category',$category->id)}}" class="m-1 btn btn-primary">View</a></td>
      <td><a href="{{URL('deleteuser',$category->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatecategoryview', $category->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endforeach
</section>
    <!----Threads--->
    <section id="threads">
    <table class="table">
    <div class="text-center"><h2 style="font-size:30px;" class="mb-1">Threads</h2></div>
    @if(method_exists($thread,'links'))
<div class="d-flex justify-content-center">
  {!! $thread->links()!!} 
</div>
@endif
  <thead>
    <tr>
      <th scope="col">Thread id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Thread Name</th>
      <th scope="col">Role</th>
      <th scope="col">View</th>
     
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($thread as $thread)
    <tr>
      <th scope="row">{{$thread->id}}</th>
      <td>{{$thread->category_name}}</td>
      <td>{{$thread->thread_name}}</td>
      <td>@if ($thread->role == 'editor')
   
   <span class="small badge bg-danger">{{$thread->role}}</span>
   @elseif($thread->role == 'user')
  
   <span class="small badge bg-warning">{{$thread->role}}</span>
   @elseif($thread->role == 'therapist')
   
   <span class="small badge bg-info">{{$thread->role}}</span>
   @else
 
 <span class="small badge bg-secondary">
     {{$thread->role}}</span>
  @endif 
</td>

<td> <a href="{{URL('thread',$thread->id)}}" class="m-1 btn btn-primary">View</a></td>
      <td><a href="{{URL('deletethread',$thread->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatethreadview', $thread->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endforeach
</section>

   <!----Posts--->
<section id="posts">
    <table class="table">
    <div class="text-center"><h2 style="font-size:30px;" class="mb-1">Posts</h2></div>
    @if(method_exists($post,'links'))
<div class="d-flex justify-content-center">
  {!! $post->links()!!} 
</div>
@endif
  <thead>
    <tr>
      <th scope="col">Post id</th>
      <th scope="col">Post Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Thread Name</th>
      <th scope="col">Role</th>
      <th scope="col">View</th>
      
     
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($post as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->post_name}}</td>
      <td>{{$post->category_name}}</td>
      <td>{{$post->thread_name}}</td>
      <td>@if ($post->role == 'editor')
   
   <span class="small badge bg-danger">{{$post->role}}</span>
   @elseif($post->role == 'user')
  
   <span class="small badge bg-warning">{{$post->role}}</span>
   @elseif($post->role == 'therapist')
   
   <span class="small badge bg-info">{{$post->role}}</span>
   @else
 
 <span class="small badge bg-secondary">
     {{$post->role}}</span>
  @endif 
</td>
      <td> <a href="{{URL('posts', $post->id)}}" class="m-1 btn btn-primary">View</a></td>
      <td><a href="{{URL('deletethread',$post->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatepostview', $post->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endforeach
    </section>


   <!----Replies--->
   <section id="replies">
    <table class="table">
    <div class="text-center"><h2 style="font-size:30px;" class="mb-1">Replies</h2></div>
    @if(method_exists($reply,'links'))
<div class="d-flex justify-content-center">
  {!! $reply->links()!!} 
</div>
@endif
  <thead>
    <tr>
      <th scope="col">Reply id</th>
      <th scope="col">User id</th>
      <th scope="col">Reply</th>
      <th scope="col">Role</th>
      <th scope="col">Created at</th>
      <th scope="col">View</th>
      
     
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($reply as $reply)
    <tr>
      <th scope="row">{{$reply->id}}</th>
      <td>{{$reply->user_id}}</td>
      <td>{{$reply->reply}}</td>
      <td>@if ($reply->role == 'editor')
   
   <span class="small badge bg-danger">{{$reply->role}}</span>
   @elseif($reply->role == 'user')
  
   <span class="small badge bg-warning">{{$reply->role}}</span>
   @elseif($reply->role == 'therapist')
   
   <span class="small badge bg-info">{{$reply->role}}</span>
   @else
 
 <span class="small badge bg-secondary">
     {{$reply->role}}</span>
  @endif 
</td>

      <td>{{$reply->created_at->format('d M Y')}}</td>
      <td> <a href="{{URL('posts', $reply->post_sid)}}" class="m-1 btn btn-primary">View</a></td>
      <td><a href="{{URL('deletereply',$reply->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
      <a href="{{URL('updatereplyview', $reply->id)}}" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endforeach
    </section>
</div>
</body>
</html>