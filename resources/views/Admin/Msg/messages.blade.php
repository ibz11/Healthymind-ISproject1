@include('Admin.topsidebarnav')
                <div class="pl-3 content" style="height:200vh;">
                <div class="row">
                    <div class="col-sm">
                <h1 class="mt-4 text-2xl"><strong>Send Message</strong></h1>
    <form action="{{URL('sendmessage')}}" method="POST" id="editform" enctype="multipart/form-data">
    @csrf
  
    
  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">sender id</label>
    <input type="text" class="form-control w-50" id="name" value="" name="name">
  </div>
  <div hidden class="mb-3 mt-3">
    <label for="email" class="form-label">Name</label>
    <input type="text" class="form-control w-50" id="name" value="" name="name">
</div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Receiver</label>
 
<select class="form-select w-50" name="receiver" aria-label="Default select example">
    @foreach($user as $user)
  <option value="{{$user->id}}">{{$user->id}} {{$user->name}}</option>
  @endforeach
 
</select>
  </div>

  
  <div class="mb-3">
    <label for="pwd" class="form-label">Quick reply</label>
   
    <select class="form-select w-50" name="quickreply" aria-label="Default select example">
  <option value="Hello">Hello</option>
  <option value="How are you?">How are you?</option>
  <option value="Good morning">Good Morning</option>  
  
  <option value="Good afternoon">Good Afternoon</option>
  <option value="Good evening">Good Evening </option> 
  
  <option value="--">n/a</option>
 
</select>
  </div>
  <div class="mb-3">
  
      <textarea name="longreply" id="" cols="30" rows="10">

      </textarea>
  </div>
  
  <button type="submit" class="text-dark btn btn-primary">Submit</button>
 

  </form>
  </div>

 
  <div class="col-sm" >
  <h1 class="mt-4 text-2xl"><strong>My Sent Messages</strong></h1>
  

      <table class="table ">
          <thead>
              <tr>
            <th>Sender_id</th>
              <th>Receiver_id</th>
              <th>Name</th>
              <th>Quick reply</th>
              <th>Long reply</th>
              <th>Created_at</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
              
              
          </thead>
          <tbody>
          @foreach($messages as $messages)
@if (isset(Auth::user()->id) && Auth::user()->id == $messages->sender_id)
              <tr>
            

        <td>{{$messages->sender_id}}</td>
        <td>{{$messages->receiver_id}}</td>
        <td>{{$messages->name}}</td>
        <td>{{$messages->quickreply}}</td>
        <td>{{$messages->longreply}}</td>
        <td>{{$messages->created_at->format('d M Y')}}</td>
        <td><a href="{{URL('deletemsg',$messages->id)}}" class="btn btn-danger">Delete</a></td>
      <td>
<a href="{{URL('editmsg',$user->id)}}"  class="text-light btn btn-success" >
 Update
</a>
              </tr>
@endif
@endforeach
          </tbody>
      </table>
  </div>
  
</div>

            </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/Admin/js/scripts.js"></script>
        </html>