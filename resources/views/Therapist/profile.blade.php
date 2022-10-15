@include('Therapist.nav')
 <div class="container-fluid">
<div class="text-center mt-5">
<h1 style="font-size:40px;"><strong>Hello! <u>{{(Auth::user()->name)}}</u>.Click below to check your profile</strong></h1>
<p  style="color:blue;">Nb:If you have created a profile no need to create again as it will be deleted by the admin </p>

</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">User_id</th>
      <th scope="col">Registered User-Name</th>
      <th scope="col">Registered Email</th>
     
      <th scope="col">Role</th>
      <th scope="col">View Profile</th>
      <th scope="col">Create Profile</th>
    
      
    </tr>
  </thead>
  <tbody>
  @foreach($user as $user)
  @if (isset(Auth::user()->id) && Auth::user()->id  == $user->id)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
    
      <td>{{$user->role}}</td>
      <td>
      <a class="mt-4 btn btn-primary"href="{{URL('viewprofile',$user->id)}}">Check profile</a></td>
      </td>
      <td><a class="mt-4 btn btn-primary"href="{{URL('createprofileview',$user->id)}}">Create profile</a></td>


</tr>
@endif
    @endforeach
   
    
  </tbody>

</table>







 </div