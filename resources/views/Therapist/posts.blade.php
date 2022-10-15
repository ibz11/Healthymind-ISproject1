@include('Therapist.nav')
<!---Posts------>
<div class=" mt-3 container-fluid">
<div class="text-center"><h2 style="font-size:40px;" class="mb-5">All created posts by Users on the forum</h2></div>

<section class="m-5 mt-5 h-100"id="posts">
<table class="m-4 table">
    <div class="text-center"><h2 style="font-size:20px;" class="mb-1"> You can check out the users Posts to reply to them</h2></div>
    <form class="form-inline" action="{{URL('searchposttherapist')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" placeholder="Search Posts by title, author and usertype "name="post">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search</button>
</form>

<a class="ml-3 btn btn-success" href="{{URL('posttherapist')}}">Refresh</a>
    @if(method_exists($post,'links'))
        <div class="m-2 d-flex justify-content-center">
           {!! $post->links()!!}
</div>
@endif
<div>
<thead>
    <tr>
      <th scope="col">Post id</th>
      <th scope="col">User Name</th>
      <th scope="col">Post Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Thread Name</th>
      <th scope="col">Content</th>
      <th scope="col">Created at</th>
     

      <th scope="col">View</th>
      
      
    </tr>
  </thead>
</tbody>
      @foreach($post as $post)
  
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->user_name}}</td>
      <td>{{$post->category_name}}</td>
      <td>{{$post->thread_name}}</td>
      <td>{{$post->post_name}}</td>
      <td>{{$post->content}}</td>
      <td>{{$post->created_at->format('d M Y')}}</td>
     
     
      <td> <a href="{{URL('posts', $post->id)}}" class="m-1 btn btn-primary">View</a></td>

     

</td>


<div>
    </tr>
    
    @endforeach 
</table>
</section>



</div>