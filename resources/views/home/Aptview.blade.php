<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view appointment</title>
</head>
<body>
    
    <div style="background:whitesmoke;margin:2%;border:solid;height:68vh;width:40vw;">
<h1 style="text-align:center;font-size:30px;"><strong>Healthymind<i></i></strong></h1>
<h2 style="margin:5%;text-align:center;font-size:22px;">From Dr.{{$Apt->therapist_name}} {{$Apt->lname}}</h2>
<p style="font-size:22px;">How are you? Hope you are doing well! You have created an appointment ID No.<u>{{$Apt->id}}</u> on {{$Apt->date}} starting from {{$Apt->time_in}}
which is ending at {{$Apt->time_out}}.The venue will be {{$Apt->location}}.I hope to see you there!Remember a healthy mind is a healthy life.
</p></br></br>
<p style="font-size:22px;">Regards,</p></br> 
<p style="font-size:22px;">Dr.{{$Apt->therapist_name}} {{$Apt->lname}}</p>

</p>  

    </div>
</body>
</html>