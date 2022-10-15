@include('home.nav')
<header style="border:solid;width:50%;height:50%;" class="m-5">
    <!---This is for displaying messages--->
<div></div>
<h1  class="m-3"style="font-size:40px;"><strong> Your Appointment has been Deleted! &#128542;</strong></h1>
@if (isset(Auth::user()->id) && Auth::user()->role == 'user' ) 
<a href="{{URL('appointments')}}" class=" m-5 btn btn-info">Go back</a>
@elseif (isset(Auth::user()->id) && Auth::user()->role == 'therapist' ) 
<a href="{{URL('/redirect')}}" class=" m-5 btn btn-info">Go to my dashboard</a>
@else
@endif
</header>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>