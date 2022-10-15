@include('home.nav')

<section id="therapists" class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 style="font-size:25px;" class="fw-bolder">All Our Therapists</h2>
                        <p class="lead fw-normal text-muted mb-5">Search therapist by first name , last name and Location </p>
                        <form class="form-inline" action="{{URL('searchtherapist')}}" style="padding:20px;" type="get">

               @csrf 
              <input type="search" placeholder="Search therapist"name="therapist">
            <button type="submit"   style="color:black;"class="ml-2 btn btn-primary" >Search</button>
            <a href="{{URL('alltherapistsview')}}" class="btn btn-info">Refresh</a>
            </form>

                    </div>
                    @if(method_exists($therapist,'links'))
            <div class="m-2 d-flex justify-content-center">
             {!! $therapist->links()!!}
             </div>
              @endif
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                    @foreach($therapist as $therapist)

                    
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="/therapists/{{$therapist->image}}" alt="..." />
                                <h5 class="fw-bolder">Dr.{{$therapist->fname}} {{$therapist->lname}}</h5>
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$therapist->role}}</div>
                                <div class="fst-italic text-muted">Studied {{$therapist->qualification}} at {{$therapist->university}}</div>
                                <div class="fst-italic text-muted">Place of work {{$therapist->location}} </div>
                                <a class="btn btn-info" href="{{URL('viewtherapist',$therapist->id)}}"> View profile</a>
                            </div>
                        </div>

                      @endforeach

                    </div>
                </div>
            </section>
                   
                    
            </section>