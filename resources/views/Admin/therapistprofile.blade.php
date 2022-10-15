@include('Admin.topsidebarnav')

                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4 text-2xl"><strong>Therapists Table</strong></h1>

                    @if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="btn-close" aria-label="Close"  data-dismiss="alert"></button>
   {{session()->get('message')}}
</div>
   @endif

 
@if(method_exists($therapist,'links'))
<div class="d-flex justify-content-center">
  {!! $therapist->links()!!} 
</div>
@endif

<form class="mt-3 form-inline" action="{{URL('searchprofile')}}" style="padding:20px;" type="get">
@csrf 
<input type="search" name="search">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search</button>
<a href="{{URL('therapistsprofiles' )}}" class="m-1 btn btn-info">Refresh</a>
</form>

<td> <a href="{{URL('therapistspdf' )}}" class="mb-1 btn btn-info">Print pdf of all therapist</a></td>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Therapist_id</th>
      <th scope="col">FName</th>
      <th scope="col">LName</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Qualification</th>
      <th scope="col">University</th>
      <th scope="col">Description</th>
      <th scope="col">Role</th>
      <th scope="col">Location</th>
      <th scope="col">Delete</th>
    
      
    </tr>
  </thead>
  <tbody>
  @foreach($therapist as $therapist)

    <tr>
      <th scope="row">{{$therapist->id}}</th>
      <th scope="row">{{$therapist->therapist_id}}</th>
      <td>{{$therapist->fname}}</td>
      <td>{{$therapist->lname}}</td>
      <td>{{$therapist->phone}}</td>
      <td>{{$therapist->email}}</td>
      <td>{{$therapist->qualification}}</td>
      <td>{{$therapist->university}}</td>
      <td>{{$therapist->description}}</td>
      <td><i class="badge bg-info">{{$therapist->role}}</i></td>
      <td>{{$therapist->location}}</td>
      <td><a href="{{URL('deleteuser',$therapist->id)}}" class="btn btn-danger">Delete</a></td>
      
</a>
</td>



    </tr>
 
    @endforeach
   
    
  </tbody>
</table>  
</div>

</div>
</body>
</html>
