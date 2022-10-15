@include('home.nav')

<div style="height:200vh;"class="container mt-4">
    <div class="main-body">
    
         
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
         
                   
              <div class="card">

              <!--https://bootdey.com/img/Content/avatar/avatar7.png-->
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <img src="/therapists/{{$therapist->image}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Dr.{{$therapist->fname}} {{$therapist->lname}}</h4>
                      <p class="text-dark mb-1"><span class="badge bg-info">{{$therapist->role}}</span></p>
                      <p class="text-dark font-size-sm">Address-{{$therapist->location}}</p>
                    
                     
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

                    @if(Auth::check())
                 
                    <h1 class="mt-4 text-2xl"><strong>You must have a user account or editor account to book an appointment </strong></h1> 
                   
                    <div class="col-sm-12">
                  
      <form action="{{URL('createappointment')}}" method="POST" id="editform"enctype="multipart/form-data">
    @csrf
  
    <h1 class="mt-4 text-2xl"><strong>Book your appointment</strong></h1>  
    <p class="text-danger">Note: be mindful of the date and time,it should be at a <u><strong>reasonable</strong></u> time and date </p>
  <div  class="mb-3 mt-3">
    <label for="email" class="form-label">Therapist_id</label>
    
    <input readonly type="text" class="form-control w-50" id="name" value="{{$therapist->id}}" name="therapist_id" >
  </div>
  <div  class="mb-3 mt-3">
    <label for="email" class="form-label">Therapist Name</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$therapist->fname}}" name="fname" >
  </div>
  <div  class="mb-3 mt-3">
    <label for="email" class="form-label">Therapist Last Name</label>
    <input readonly type="text" class="form-control w-50" id="name" value="{{$therapist->lname}}" name="lname" >
  </div>
  
  <div   class="mb-3 mt-3">
    <label for="email" class="form-label">Date</label>
    <input  type="date" class="datepicker form-control w-50" id="phone" value=""  name="date" required>
  </div>

  



  <div class="mb-3 mt-3">
  <p class="text-danger">Nb: Time in and time out should be less than or equal to 2 hours</p>
</div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Time in</label>

    <p class="text-danger">Nb:Write in am pm format</p>
    <input type="time" class="form-control w-50" id="email" value=""  name="time_in" required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Time out</label>
    <p class="text-danger">Nb:Write in am pm format</p>
    <input type="time" class="form-control w-50" id="email" value=""  name="time_out" required>
  </div>
  <div class="mb-0 mt-3">
    <label for="email" class="form-label">Issue that I am dealing with</label>
</div>
  <div class="mb-3 mt-3">
    <textarea name="issue"  cols="30" rows="10">

  </textarea>
  </div>
  <div class="mb-0 mt-3">
    <label for="email" class="form-label">Venue</label>
</div>
<div class="mb-3 mt-3">
    <select id="qualifications"   class="block mt-1 w-50" name="location" >
   <option value="Online" >
             Online
           </option>
         <option value="{{$therapist->location}}" >
         Therapist's office: {{$therapist->location}} 
           </option>
         
           
          
</select>
</div>
  <div class="mb-3 mt-3">
    <button class="text-light btn btn-danger "type="submit">Book</button>
</div>
</form>
@else
<h1 class="mt-4 text-2xl"><strong>You can book an appointment once you are logged in.</strong></h1>  
@endif
               
                </div>

                  </div>
               
                </div>
            
              </div>
           
              
                </div>
                
            
                  </div>
                
           
                </div>
              </div>



            </div>
          </div>


        </div>
    </div>
 





</div>
<!--<script>

  <script type="text/javascript">
    
        $('form input[type="submit"]').prop("disabled", false);
   $('.datepicker').datepicker({ 
       startDate: new Date()
   });
   </script>-->
   <!----Bootstrap-datepicker------>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</script>
  </body>
  </html>