@include('Therapist.nav')
<div class=" mt-3 container-fluid">

<h2 style="font-size:33px;" class="mb-1"><strong> This is the diagnosis and prescription of patient name  <u class="text-danger">{{$Apt->user_name}} </u> and user id:<u class="text-danger">{{$Apt->user_id}} </u> </strong></h2>

<h2 style="font-size:22px;" class="mt-2 mb-1"><strong> The appointment was done on  <u class="text-danger">{{$Apt->date}} </u> from<u class="text-danger">{{$Apt->time_in}} </u> to: <u class="text-danger">{{$Apt->time_out}} </u>  </strong></h2>

<h2 style="font-size:33px;" class="mt-5 ml-4"><strong><u> Diagnosis</u></strong></h2>
<p style="font-size:25px;"class="mt-2 ml-2">{{$Apt->diagnosis}}</p>



<h2 style="font-size:33px; margin-top:150px;" class="ml-4"><strong><u> Prescription </u></strong></h2>

<p style="font-size:25px;" class="mt-2 ml-2"> {{$Apt->prescription}} </p>













</div>












</div>