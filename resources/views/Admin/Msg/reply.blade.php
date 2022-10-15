@include('Admin.topsidebarnav')

                <div class="pl-3 content" style="height:200vh;">
                @if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="close" data-dismiss="alert">x</button>
   {{session()->get('message')}}
</div>
   @endif
   <form class="form-inline" action="{{URL('searchmsg')}}" style="padding:20px;" type="get">
@csrf 
<input placeholder="Search your replies"type="search" name="query">
<button type="submit"   style="color:black;"class="ml-2 btn btn-primary"  >Search Message</button>
</form>
                <div class="row">
                
                <h1 class="mt-4 text-2xl"><strong>Received messages</strong></h1>
   
  </div>
  <div class="col-sm" >
      <table class="table ">
          <thead>
              <tr>
            <th>Sender_id</th>
              <th>Receiver_id</th>
              <th>Sender Name</th>
              <th>Role</th>
              <th>Quick reply</th>
              <th>Long reply</th>
              <th>Created_at</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
              
              
          </thead>
          <tbody>
          @foreach($messages as $messages)
@if (isset(Auth::user()->id) && Auth::user()->id == $messages->receiver_id)
              <tr>
            

        <td>{{$messages->sender_id}}</td>
        <td>{{$messages->receiver_id}}</td>
        <td>{{$messages->name}}</td>
        <td>{{$messages->role}}</td>
        <td>{{$messages->quickreply}}</td>
        <td>{{$messages->longreply}}</td>
        <td>{{$messages->created_at->format('d M Y')}}</td>
        <td><a href="{{URL('deletemsg')}}" class="btn btn-danger">Delete</a></td>
      <td>

<button class="btn btn-success text-success" type="button" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Send message
  </button>
  
<div class="mt-3 collapse" id="collapseExample">
<h1 class="mt-4 text-2xl"><strong>Send a Reply Message</strong></h1>
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
    <input  readonly type="text" class="form-control w-50" id="name" value="{{$messages->sender_id}}" name="receiver">
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
  @endif
  @endforeach     
  </tr>


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