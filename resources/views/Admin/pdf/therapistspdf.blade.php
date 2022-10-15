<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapists pdf</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 10%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h1>All the therapists profile</h1>
<table>
  
  
    <tr>
    <th >id</th>
      <th >Therapist_id</th>
      <th >FName</th>
      <th >LName</th>
      <th >Phone</th>
      <th >Email</th>
      <th >Qualification</th>

     
   

</tr>

  @foreach($therapist as $therapist)

<tr>
  <th scope="row">{{$therapist->id}}</th>
  <th scope="row">{{$therapist->therapist_id}}</th>
  <td>{{$therapist->fname}}</td>
  <td>{{$therapist->lname}}</td>
  <td>{{$therapist->phone}}</td>
  <td>{{$therapist->email}}</td>
  <td>{{$therapist->qualification}}</td>
 
</tr>
</tr>
    <th >University</th>
    <th >Description</th>
      <th >Role</th>
      <th >Location</th>
  <tr>
  <td>{{$therapist->university}}</td>
  <td>{{$therapist->description}}</td>
  <td>{{$therapist->role}}</td>
  <td>{{$therapist->location}}</td>
</tr>    
</td>
</tr>

@endforeach
</table>
</body>
</html>