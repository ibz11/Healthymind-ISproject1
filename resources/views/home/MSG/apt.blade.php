@include('home.nav')
<header style="border:solid;width:50%;height:50%;" class="m-5">
    <!---This is for displaying messages--->
<div></div>
<h1  class="m-3"style="font-size:40px;"><strong>Congratulations! Your Appointment has been Created! &#128512; </strong></h1>
<a href="{{URL('appointments')}}" class=" m-5 btn btn-dark">Go check your appointments</a>
<a href="{{URL('redirect')}}" class=" m-5 btn btn-info">Go home</a>
</header>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>