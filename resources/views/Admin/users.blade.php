@include('Admin.topsidebarnav')

                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4 text-2xl"><strong>Users Table</strong></h1>

                    @if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="btn-close" aria-label="Close"  data-dismiss="alert"></button>
   {{session()->get('message')}}
</div>
   @endif

                   
<form class="form-inline" action="{{URL('searchusers')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" name="search">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search</button>
<a href="{{URL('users' )}}" class="m-1 btn btn-info">Refresh</a>
</form>
<td> <a href="{{URL('userspdf' )}}" class="m-1 btn btn-info">Print pdf of all users</a></td>
<div>                    
<div>
@if(method_exists($data,'links'))
<div class="d-flex justify-content-center">
  {!! $data->links()!!} 
</div>
@endif

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
      @foreach($data as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>

      <td>
      @if ($user->role == 'editor')
    <i class="fw-bold badge bg-danger">{{$user->role}}</i>
    @elseif($user->role == 'user')
    <i class="fw-bold badge bg-warning">{{$user->role}}</i>
    @elseif($user->role == 'therapist')
    <i class="fw-bold badge bg-info">{{$user->role}}</i>
    @else
    
    <i class="fw-bold badge bg-secondary">{{$user->role}}</i>
   @endif
   </td>
      <td><a href="{{URL('deleteuser',$user->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
<a href="{{URL('updateuser',$user->id)}}"  class="text-light btn btn-success" >
 Update
</a>
</td>
@if ($user->role == 'admin')
@elseif($user->role == 'therapist')

<td><a href="{{URL('makeuser',$user->id)}}" class="btn btn-dark">Make User</a></td>
@elseif($user->role == 'editor')
<td><a href="{{URL('maketherapist',$user->id)}}" class="btn btn-dark">Make User</a></td>
@else
<td><a href="{{URL('maketherapist',$user->id)}}" class="btn btn-info">Make Therapist</a></td>
<td><a href="{{URL('makeeditor',$user->id)}}" class="btn btn-warning">Make Editor</a></td>
@endif
<!--<td>
<a href="{{URL('addviewtherapist',$user->id)}}"  class="text-light btn btn-info" >
 Make therapist
</a>
</td>-->


    </tr>
    @endforeach
   
    
  </tbody>
</table>  
</div>

</div>
</body>
</html>
