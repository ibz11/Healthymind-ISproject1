<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .container {
  font-family: arial;
  font-size: 21px;
  margin: 15px;
  width: 650px;
  height: 450px;
  outline: solid 1px black;
}

.child {
  width: 50px;
  height: 50px;
  background-color: red;
  /* Center horizontally*/
  margin: 0 auto;
}
</style>
    <title>Diagnosispdf</title>

</head>
<body>


<div class="container">
<h2 style="text-align:center;"><u>Healthy Mind</u></h2>
<h3 style="font-size:16px;" ><strong> This is the diagnosis and prescription of patient name  <u style="color:red;">{{$Apt->user_name}} </u> and user id:<u style="color:red;">{{$Apt->user_id}} </u> </strong></h3>
<h3 style="font-size:16px;" class="mt-2 mb-1"><strong> The appointment was done on  <u style="color:red;">{{$Apt->date}} </u> from <u style="color:red;" > {{$Apt->time_in}} </u> to: <u style="color:red;">{{$Apt->time_out}} </u>  </strong></h3>
 <!-- <div class="child"></div>-->

 <h2 style="align-text:center;"><u>Diagnosis</u></h2>
 <h3 style="font-size:16px;" class="mt-2 mb-1"><strong>  <u style="color:red;">{{$Apt->diagnosis}} </u>  </strong></h3>
 <h2 style="align-text:center;"><u>Prescription</u></h2>
 <h3 style="font-size:16px;" class="mt-2 mb-1"><strong>  <u style="color:red;">{{$Apt->prescription}} </u>  </strong></h3>

 <h3 style="margin-top:40px;font-size:16px;" class="mt-2 mb-1"><strong>The above patient was seen by Dr.<u >{{$Apt->therapist_name}} {{$Apt->lname}}</u>  </strong></h3>



</div>
    
</body>
</html>