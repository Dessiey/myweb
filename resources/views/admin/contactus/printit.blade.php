@extends('layouts.admin')
@section('content')

<div class="card">
<div class="alert alert-success">
       New JU-CVMS User created
    </div>
  <div class="card-header">
         Use the Following Cridentials  
    </div>
    <div class="card-body">
        <b><h3> JU-CVMS</h3></b>
        <h4>CERTIFICATION AND VERIFICATION SYSTEM </h4>
            <hr>
            <a style="font-family:Courier;">  
      <h5> In position :  <u> {{$position}} </u> </h5>
      <h5> College :  <u> {{$lable}} </u> </h5>
      <h5> Your <b>Password : </b>  {{$passcode}}  </h5>
      <h5> Your Username :  <u> {{$username}} </u> </h5>
      
      <h5> Given Date :  <u> {{$givendate}} </u> </h5>
      <h5> YOUR PRIVATE KEY :  <u> <hr>{{$privatekey}} </hr></u> </h5>
      <hr>
      <b><i>You can Reset YOUR Cridentials</i> </b>
       / JIMMA UNIVERSITY, ETHIOPIA / 
     </a> 
        <br>
        
          
    </div>
    
</div>

@endsection