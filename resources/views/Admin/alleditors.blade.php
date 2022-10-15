@include('Admin.topsidebarnav')

                <!-- Page content-->
                <div style="height:100vh;" class="container-fluid">
                    <h1 class="mt-4 text-2xl"><strong>Editors Table</strong></h1>

                    @if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="btn-close" aria-label="Close"  data-dismiss="alert"></button>
   {{session()->get('message')}}
</div>
   @endif

 
@if(method_exists($user,'links'))
<div class="d-flex justify-content-center">
  {!! $user->links()!!} 
</div>
@endif

<form class="form-inline" action="{{URL('searchalleditors')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" name="search">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search</button>
<a href="{{URL('alleditors' )}}" class="m-1 btn btn-info">Refresh</a>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Role</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($user as $user)

    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td><i class="fw-bold badge bg-danger">{{$user->role}}</i></td>
      <td><a href="{{URL('deleteuser',$user->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
<a href="{{URL('updateuser',$user->id)}}"  class="text-light btn btn-success" >
 Update
</a>
</td>
<td><a href="{{URL('makeuser',$user->id)}}" class="btn btn-dark">Make User</a></td>



    </tr>
  
    @endforeach
   
    
  </tbody>
</table>  
</div>

</div>
</body>
</html>
