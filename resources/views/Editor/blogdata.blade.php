@include('Editor.nav')
<div class=" mt-3 container-fluid">
<div class="text-center"><h2 style="font-size:30px;" class="mb-5">Forum Analytics</h2></div>
  <!----Posts--->
  <table class="table">
    <div class="text-center"><h2 style="font-size:30px;" class="mb-1">Posts</h2></div>
    @if(method_exists($posts,'links'))
<div class="d-flex justify-content-center">
  {!! $posts->links()!!} 
</div>
@endif
  <thead>
    <tr>
      <th scope="col">Post id</th>
      <th scope="col">User Name</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Role</th>
      
     
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $posts)
    <tr>
      <th scope="row">{{$posts->id}}</th>
      <td>{{$posts->user_name}}</td>
      <td>{{$posts->title}}</td>
      <td>{{$posts->category}}</td>
      <td>{{$posts->description}}</td>
      
      <td>@if ($posts->role == 'editor')
   
   <span class="small badge bg-danger">{{$posts->role}}</span>
   @elseif($posts->role == 'user')
  
   <span class="small badge bg-warning">{{$posts->role}}</span>
   @elseif($posts->role == 'therapist')
   
   <span class="small badge bg-info">{{$posts->role}}</span>
   @else
 
 <span class="small badge bg-secondary">
     {{$posts->role}}</span>
  @endif 
</td>
<td>
      <a href="/blog/{{$posts->slug}}" class="m-1 btn btn-primary">View</a>

</td>
<td>
<form action="/blog/{{$posts->slug}}" method="POST" >
                                        @csrf
                                   @method('delete')
                                        <button type="submit" class="ml-3 text-danger btn btn-danger">Delete</button>
                                     </form>
                                    
      
      <td>
      <a href="/blog/{{$posts->slug}}/edit" class="m-1 btn btn-success">Edit</a>

</td>


<div>
    </tr>
    @endforeach




















</div>
</body>
</html>