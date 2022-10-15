<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users pdf</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
<table>
<table>
  <tr>

  </tr>
  
    <tr>
      <th >id</th>
      <th >Name</th>
      <th >Email</th>
      <th >Mobile</th>
      <th >Role</th>
      
      
      
    </tr>
  </thead>
  <tbody>
      @foreach($user as $user)
    <tr>
      <td >{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->role}}</td>
      
</td>
</tr>
@endforeach
</body>
</html>