@extends('layout.base')
@section('content')


<div class="container">
   <h3>Login Form</h3>
   <p id="response"></p>
<form name="login_frm" id="login_frm" method="POST" action="">
    @csrf
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" />
                <label class="form-label" for="email">Email address</label>
            </div>
            <span class="error text-danger" id="emailerr"></span>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-6">
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" />
                <label class="form-label" for="password">Password</label>
            </div>
            <span class="error text-danger" id="passerr"></span>
        </div>
    </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
  <div class="text-center">
    <p>Not a member? <a href="regi">Register</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>
  </div>

</form>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function(){
        $("#login_frm").on('submit', function(e){
           e.preventDefault();
           $.ajax({
          url: "{{ route('logincheck') }}",
          type: "POST",
          data: new FormData($("#login_frm")[0]),
          processData: false,
          contentType: false,
          success: function (data) {
              if(data.error){
                $("#emailerr").text(data.error.email);
                $("#passerr").text(data.error.password)
              }

              if(data.success == true){
                
                $("#response").html('<div class="alert alert-success">'+data.msg+'</div>');
              }

              setTimeout(function(){
                window.location.href = "{{ route('dashboard') }}";
                $(".error").text('');$("#response").text('');
              },4000);
          }
      }); 
        });
    });
</script>

@endsection