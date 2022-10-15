<section style="background-color:whitesmoke;">


       
<div class="m-1">
<section class="gradient-custom">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
      @foreach($post as $post)
        <div class="card">
          <div class="card-body p-4">
            <h4 class="text-center mb-4 pb-2">Post section</h4>

            <div class="row">
              <div class="col">
                <div class="d-flex flex-start">
                <a class="me-3" href="#">
                        <img class="rounded-circle shadow-1-strong"
                          src="/icon/avatar.png" alt="avatar"
                          width="65" height="65" />
                      </a>
                  <div class="flex-grow-1 flex-shrink-1">
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                      
                        <p class="mb-1">
                        {{$post->user_name}} <span class="small text-muted">  Created at {{$post->created_at->format('d M Y')}} </span>
                        </p>
                        
                        @if ($post->role == 'editor')
   
    <span class="small badge bg-danger">{{$post->role}}</span>
    @elseif($post->role == 'user')
   
    <span class="small badge bg-warning">{{$post->role}}</span>
    @elseif($posts->role == 'therapist')
    
    <span class="small badge bg-info">{{$post->role}}</span>
    @else
  
  <span class="small badge bg-secondary">
      {{$posts->role}}</span>
   @endif 
                       
                      </div>
                      <p class="small mb-0">
                       {{$post->content}} 
                      </p>
                      @if(Auth::check())
                      <a href="{{URL('createreplyview',$post->id)}}" style="color:blue; font-size:20px;"><i style="color:blue;"class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                    @endif
                    </div>
              @endforeach

             <!----Replies section----->
             @foreach($reply as $reply)
             @if ($post->id == $reply->post_id)
                    <div class="d-flex flex-start mt-4">
                      <a class="me-3" href="#">
                        <img class="rounded-circle shadow-1-strong"
                          src="/icon/avatar.png" alt="avatar"
                          width="65" height="65" />
                      </a>
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                          {{$reply->id}}
                            <p class="mb-1">
                              {{$reply->user_name}} 
                                
   <span class="small"> Created at {{$reply->created_at->format('d M Y')}}</span> 
                            </p>
                            @if (isset(Auth::user()->id) && Auth::user()->id == $reply->user_id )
                            <div>
                            <a href="{{URL('updatereplyview', $reply->id)}}" class="mb-1 badge bg-success">
                              update</a>
                              <a href="{{URL('deletereply',$reply->id)}}" class="mb-1 badge bg-danger">
                              delete</a>
                              @endif
                              @if (isset(Auth::user()->role) && Auth::user()->role == 'editor')
                              <a href="{{URL('updatereplyview', $reply->id)}}" class="mb-1 badge bg-success">
                              Edit for editor</a>
                              <a href="{{URL('deletereply',$reply->id)}}" class="mb-1 badge bg-danger">
                              delete for editor</a>
                              @endif
                         </div>
                         @if ($post->role == 'editor')
   
    <span class="small badge bg-danger">{{$post->role}}</span>
    @elseif($post->role == 'user')
   
    <span class="small badge bg-warning">{{$post->role}}</span>
    @elseif($posts->role == 'therapist')
    
    <span class="small badge bg-info">{{$post->role}}</span>
    @else
  
  <span class="small badge bg-secondary">
      {{$posts->role}}</span>
   @endif 
                          </div>
                          <p class="small mb-0">
                            {{$reply->reply}}
                          </p>
                        </div>
                      </div>
                    </div>
              @endif      
              @endforeach
                    

                   

                   

                   
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
























































<div style="height:100vh;" class="mt-5  w-50 text-dark bg-light">
<div class="row mt-5">

<div style="border:solid;" class="col-sm-3" style="border:solid;" >
<img class="rounded-circle shadow-1-strong"
                          src="/icon/avatar.png" alt="avatar"
                          width="35" height="35" />
</div>

<div style="border:solid;" class="col-sm-3">
  <h3 style="font-size:22px;"class="mt-4 text-light">Ibrahim</h3>
</div>

<div  style="border:solid;" class="col-sm-3">
  <h3 style="font-size:22px;"class="mt-4 text-light">Role</h3>
</div>

<div style="border:solid;" class="col-sm-3">
  <h3 style="font-size:22px;"class="mt-4 text-light"><i>Creator</i></h3>
</div>
</div>

<div class="row">
<div style="border:solid;" class="col-sm-10">
  <h1>content</h1>
</div>
<div style="border:solid;" class="col-sm-2">
  <h1>replybutton</h1>
</div>
</div>

<div class="row">

            
<div style="border:solid;" class="col-sm-1">

</div>
<div style="border:solid;" class="col-sm-2">
<img class="rounded-circle shadow-1-strong"
                          src="/icon/avatar.png" alt="avatar"
                          width="35" height="35" />


</div>
<div style="border:solid;" class="col-sm-2">
<h1> {{$reply->id}}</h1>
</div>
<div style="border:solid;" class="col-sm-4">
<h1>role</h1>
</div>

<div style="border:solid;" class="col-sm-3">
<h1>Created at</h1>
</div>
<div style="border:solid;" class="col-sm-1">

</div>
<div style="border:solid;" class="col-sm-8">
<h1>Post</h1>
</div>

<div style="border:solid;" class="col-sm-3">
<h1>update delete</h1>
</div>

</div>

</div>
</div>











</div>