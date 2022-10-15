@include('Therapist.nav')
 <div class="container-fluid">
<div class="text-center mt-5">
<h1 style="font-size:40px;"><strong>Hello! <u>{{(Auth::user()->name)}}</u>.Checkout your profile</strong></h1>
</div>

<div class="container mt-4">
    <div class="main-body">
    
         
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
            @foreach($therapist as $therapist)
                    @if (isset(Auth::user()->id) && Auth::user()->id  == $therapist->therapist_id)
              <div class="card">

              <!--https://bootdey.com/img/Content/avatar/avatar7.png-->
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="/therapists/{{$therapist->image}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Dr.{{$therapist->fname}} {{$therapist->lname}}</h4>
                      <p class="text-dark mb-1"><span class="badge bg-info">{{$therapist->role}}</span></p>
                      <p class="text-dark font-size-sm">Address-{{$therapist->location}}</p>
                    
                      <a href="{{URL('updateprofileview',$therapist->id)}}" class="btn btn-outline-primary">Update</a>
                      <a href="{{URL('deleteprofile',$therapist->id)}}" class="btn btn-danger">Delete profile</a>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$therapist->fname}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$therapist->lname}}
                    </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$therapist->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Role</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$therapist->role}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$therapist->phone}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Qualification</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$therapist->qualification}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">University Studied</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$therapist->university}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Biography & Description</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$therapist->description}}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Location of establishment</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$therapist->location}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    
                      <a href="{{URL('updateprofileview',$therapist->id)}}" class="mt-4 btn btn-outline-success">Update</a>
                    </div>
                  </div>
               
                </div>
            
              </div>
           
              
                </div>
                
            
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
 





</div>

</body>
</html>
