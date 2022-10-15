@include('Therapist.nav')
<div class=" mt-3 container-fluid">

@if (session()->has('message'))
   <div class="alert alert-primary">
   <button type="button" class="close" data-dismiss="alert">x</button>
   {{session()->get('message')}}
</div>
   @endif

<h2 style="font-size:33px;" class="mb-1"><strong> Edit the diagnosis and prescription for the patient: <u class="text-danger">{{$Apt->user_name}} </u></strong></h2></div>


<div class="m-5">
<form action="{{URL('editdiagnosisform',$Apt->id)}}" method="POST" id="editform"enctype="multipart/form-data">
    @csrf
<div   class="mb-0 mt-3">
    <label for="" class="text-2xl form-label"><strong>Edit Diagnosis for the patient</strong></label>
</div>
  <div  class="mb-3 mt-3">
    <textarea  name="diagnosis"  cols="30" rows="10">
{{$Apt->diagnosis}}
  </textarea>
  </div>

  <div   class="mb-0 mt-3">
  <label for="" class="text-2xl form-label"><strong>Edit Prescription</strong></label>
</div>
  <div  class="mb-3 mt-3">
    <textarea  name="prescription"  cols="30" rows="10" required>
    {{$Apt->diagnosis}}
  </textarea>
  </div>
  <div  class="mb-3 mt-3">
<button class="btn btn-info text-info"type="submit">Submit</button>

</div>




</form>
</div>


















</div>