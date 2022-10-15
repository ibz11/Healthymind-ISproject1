<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Healthymind</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="home/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="home/css/styles.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{URL('/')}}">Healthymind</a>
                    <button class="navbar-toggler" type="button"
                     data-bs-toggle="collapse" 
                     data-bs-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent" aria-expanded="false"
                       aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                       </span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{URL('/')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                            <li  class="nav-item"><a class="nav-link" href="/blog">Blog </a></li>
                             <li  class="nav-item"><a class="nav-link" href="{{URL('forum')}}">Forum</a></li>
                             @if(Auth::check())
                             <li  class="nav-item"><a class="nav-link" href="{{URL('appointments')}}">Appointments</a></li>
                            @endif
                          @if (Route::has('login'))
                            @auth
                            <x-app-layout>
                                
                            </x-app-layout>
                   
                        
                    @else
                    <li style="margin-right:10px;color:white;"class="nav-item pt-2  "><a class="nav-link badge bg-info " href="{{URL('login')}}">Login</a></li>
                      

                        @if (Route::has('register'))
                        <li class="nav-item pt-2 mr-2"><a class="nav-link badge bg-primary" href="{{URL('register')}}">Register</a></li>
                        @endif
                    @endauth
              
            @endif
         
                            
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Healthymind</h1>
                                <p class="lead fw-normal text-white-50 mb-4">"A healthy mind is a healthy life"</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#therapists">Book appointment</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="{{URL('forum')}}">Forum</a>
                                    <a class="btn btn-outline-primary btn-lg px-4" href="{{URL('/blog')}}">Blog</a>
                                    @if(Auth::check())
                                    <a class="btn btn-light btn-lg px-5" href="{{URL('appointments')}}">Check appointments</a>
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="images/home.jpg" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- About section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 style="font-size:23px;" class="fw-bolder mb-0"><strong>A better way to fix your mental health</strong></h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Interact on our forum</h2>
                                    <p class="mb-0">Here you can post your issues that you go through and be helped by other users or out therapists.</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-dark bg-gradient text-white rounded-3 mb-3"><i class="bi bi-eye"></i></div>
                                    <h2 class="h5">Book an appointment</h2>
                                    <p class="mb-0">Book one on one appointments with our therapists to better your mental health.Our consultion fees are cheap as Ksh.300</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-pen"></i></div>
                                    <h2 class="h5">Read our blog</h2>
                                    <p class="mb-0">Here you can read articles and other studies from our therapists to learn about mental health.</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           
       <!--Guide section-->
       <section style="height:130vh;"class="py-5" id="features">
                <div class="container px-5 my-5">
                <h2 style="font-size:33px;" class="mb-5 text-center fw-bolder mb-0"><strong>How to book an appointment</strong></h2>
                    <!--<div class="row gx-5">
                    
                        <div class="col-lg-12">-->
                            <div class="row ">
                            
                                <div class="col-sm-12 mb-1 h-100">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-">1</i></div>
                                    <h2 class="h5">Step 1. Create an account</h2>
                                    <p class="mb-0">You must be a registered user for you to make an appointment.
                                        @if(Auth::check())
                                        @else
                                        <p>You can register below: </p>
                                    <a href="{{URL('register')}}"class="badge bg-dark">Register</a>
                                        @endif
</div>  
                                
<div class="row">
                                <div class="col-sm-12 mb-1 h-100">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-">2</i></div>
                                   <h2 class="h5">Step 2. View therapist profiles</h2>
                                    <p class="mb-0">Here you can see all the therapists details that you might need to book an appointment with.You can view them here:</p>
                                    <a href="{{URL('alltherapistsview')}}"class="badge bg-dark">View therapists</a>
                                </div>

</div>
<div class="row">
                                <div class="col-12 mb-1 ">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-">3</i></div>
                                    <h2 class="h5">Step 3. Book an appointment on the form</h2>
                                    <p class="mb-0">There will be a form displayed once logged in in the therapist profile and then you can book date time and venue of the therapy session.You can check therapist profiles below</p>
                                    <a href="{{URL('alltherapistsview')}}"class="badge bg-dark">Check therapists profiles</a>
                                </div>



                                <div class="row">                             
                                     <div class="col-12 mb-1">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi">4</i></div>
                                    <h2 class="h5">Step 4. Wait for the appointment to be approved</h2>
                                    <p class="mb-0">You must wait for your appointment to be approved for you to proceed.You can check appointments below</p>
                                    <a href="{{URL('appointments')}}"class="badge bg-dark">My appointments</a>
                                </div>
</div>



                                <div class="row">
                                <div class="col-12 mb-1 ">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-">5</i></div>
                                    <h2 class="h5">Step 5. Print PDF</h2>
                                    <p class="mb-0">Once you appointment is approved you can download the  pdf and present on the day of appointment </p>
                                </div>
</div>  
</div>                              
                            
                        </div>
                    </div>
                </div>
            </section>     


            <section >
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">“I would say what others have said: It gets better. One day, you’ll find your tribe. You just have to trust that people are out there waiting to love you and celebrate you for who you are. In the meantime, the reality is you might have to be your own tribe. You might have to be your own best friend. That’s not something they’re going to teach you in school. So start the work of loving yourself.</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" src="
                                    https://dummyimage.com/40x40/ced4da/6c757d 
                            " alt="profile picture" />
                                
                                    <div class="fw-bold">
                                        Ibrahim
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        Founder, Healthmind
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
        
                    <section id="therapists" class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="mb-4  text-center">
                        <h2 style="font-size:25px;" class="fw-bolder">Our Therapists</h2>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to quality and success in your mental health journey</p>
                        <a href="{{URL('alltherapistsview')}}" class="btn btn-primary">View all the therapists</a>
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
                                <a class="btn btn-info text-light" href="{{URL('viewtherapist',$therapist->id)}}"> View profile</a>
                            </div>
                        </div>

                      @endforeach

                    </div>
                </div>
            </section>
                   
                    
            </section>

            <!-----FAQ------->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Frequently Asked Questions</h1>
                        <p class="lead fw-normal text-muted mb-0">How can we help you?</p>
                    </div>
                    <div class="row gx-5">
                        <div class="col-xl-8">
                            <!-- FAQ Accordion 1-->
                            <h2 class="fw-bolder mb-3">Frequently Asked Questions</h2>
                            <div class="accordion mb-5" id="accordionExample">
                                <div class="accordion-item">
                                    <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How do we pay for services?</button></h3>
                                    <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>First you must be a registered user</strong>
                                           Then you have to create an appointment and wait for it to be approved.Then you can pay when you arrive at the venue(Online or physical as per  the booked appointment location preference)
                                            
                                            You can either pay cash or mpesa to the therapist.The therapist will guide you on how to pay 
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Are the services cheap?</button></h3>
                                    <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>Yes our services are very affordable</strong>
                                            We have catered this website towards student and we understand that students may not have enough money for therapy services.
                                          
                                            Our consultation fee is as cheap as Ksh.300 and other additional services range from Ksh.400 - Ksh.3,000 depending on the severity of the issue.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header" id="headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How can you register as a <strong>   Therapist </strong>?</button></h3>
                                    <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>First create an account on the website as a normal user.After that,send an email to healthymind@gmail.com</strong>
                                           with all of your credentials such as your profile picture,resume and cover letter as well as the registered name and email used in registering yourself on the site.We will get back to you with a feedback email.  
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h3 class="accordion-header" id="headingFour"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How can you register as an <strong> Editor</strong>?</button></h3>
                                    <div class="accordion-collapse collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>First create an account on the website as a normal user.After that,send an email to healthymind@gmail.com</strong>
                                           with all of your credentials such as your profile picture,resume and cover letter as well as the registered name and email used in registering yourself on the site.We will get back to you with a feedback email.  
                                           
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4">
                            <div class="card border-0 bg-light mt-xl-5">
                                <div class="card-body p-4 py-lg-5">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="h6 fw-bolder">Any more questions?</div>
                                            <p class=" mb-4">
                                                Contact us at
                                                <br />
                                                <a href="#!">healthymind@gmail.com</a>
                                               <div> <a href="+254704736051">Phone: +254712345678 </a></div>
                                            </p>
                                            <div class="mt-2 h6 fw-bolder">Other contacts</div>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-instagram"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-facebook"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-linkedin"></i></a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Healthymind 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="{{URL('/')}}">Home</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="{{URL('forum')}}">Forum</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="/blog">Blog</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        
    </body>
</html>
