<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | CoderGirl</title>
  <!---Custom CSS File--->
  <!-- <link rel="stylesheet" href="{{ asset(env('PUBLICPATH').'assets/style.css' ) }}"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
  <style>
    .gradient-custom {
/* fallback for old browsers */
background: #f093fb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
  </style>
</head>
<body> 
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <p id="response"></p>
            <form name="reg_frm" id="reg_frm" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="firstName" name="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">First Name</label>
                  </div>
                  <span class="error text-danger" id="fnamerr"></span>
                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>
                  <span class="error text-danger" id="lnamerr"></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="email" class="form-control form-control-lg" id="email" name="email" />
                    <label for="email" class="form-label">Email</label>
                    <span class="error text-danger" id="emailerr"></span>
                  </div>
                  
                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="Female" checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                      value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender"
                      value="Other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>
                  <span class="error text-danger" id="gendererr"></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <label class="form-check-label" for="reverseCheck1">
                    Hobbies
                  </label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" id="inlineCheckbox1" value="Music">
                    <label class="form-check-label" for="inlineCheckbox1">Music</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" id="inlineCheckbox2" value="Singing">
                    <label class="form-check-label" for="inlineCheckbox2">Singing</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" id="inlineCheckbox3" value="Cricket" >
                    <label class="form-check-label" for="inlineCheckbox3">Cricket</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" id="inlineCheckbox4" value="Travelling" >
                    <label class="form-check-label" for="inlineCheckbox4">Travelling</label>
                  </div>
                  <span class="error text-danger" id="hobbieserr"></span>
                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control form-control-lg" onkeypress="return validateNumber(event)" />
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>
                  <span class="error text-danger" id="phonerr"></span>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                <lable>Country</lable>
                <select class="form-select" name="country" id="country" aria-label="Default select example">
                <option selected value="">Select Country</option>
                @foreach($country as $item)
                <option value="{{ $item->id }}">{{$item->country_name}}</option>
                @endforeach
                </select>
                <span class="error text-danger" id="countryerr"></span>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <lable>State</lable>
                  <select class="form-select" name="state" id="state" aria-label="Default select example">
                  <option selected value="">Select Country</option>
                  
                  </select>
                  <span class="error text-danger" id="staterr"></span>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <label>Password</label>
                  <input type="password" name="password" id="password" class="form-control form-control-lg">
                  <span class="error text-danger" id="passerr"></span>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                
                <label>Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control form-control-lg">
                <span class="error text-danger" id="cpasserr"></span>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                
                <label>City</label>
                <input type="text" name="city" id="city" class="form-control form-control-lg">
                <span class="error text-danger" id="cityerr"></span>
                </div>
              </div>


              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>

<script>
  function validateNumber(e) {
      const pattern = /^[0-9]$/;

      return pattern.test(e.key )
  }

  $(document).ready(function(){
    $('#country').on('change', function () {
      var idCountry = this.value;
      $("#state").html('');
      $.ajax({
          url: "{{ route('selectstate') }}",
          type: "POST",
          data: {
              country_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#state').html('<option value="">-- Select State --</option>');
              $.each(result.states, function (key, value) {
                  $("#state").append('<option value="' + value
                      .id + '">' + value.state_name + '</option>');
              });
              
          }
      });
    });

    $('#reg_frm').on('submit', function(e){
      e.preventDefault();
      $.ajax({
          url: "{{ route('registration') }}",
          type: "POST",
          data: new FormData($("#reg_frm")[0]),
          processData: false,
          contentType: false,
          success: function (data) {
              if(data.error){
                $("#fnamerr").text(data.error.firstName);
                $("#lnamerr").text(data.error.lastName);
                $("#emailerr").text(data.error.email);
                $("#phonerr").text(data.error.phoneNumber);
                $("#gendererr").text(data.error.gender);
                $("#hobbieserr").text(data.error.hobbies);
                $("#countryerr").text(data.error.country);
                $("#staterr").text(data.error.state);
                $("#passerr").text(data.error.password);
                $("#cpasserr").text(data.error.cpassword);
                $("#cityerr").text(data.error.city);
              }

              if(data.success == true){
                $(window).scrollTop(0);
                $('#reg_frm').trigger('reset');
                $("#response").html('<div class="alert alert-success">'+data.msg+'</div>');
              }

              setTimeout(function(){
                window.location.href = "{{ route('login') }}"
                $(".error").text('');$("#response").text('');
              },4000);
          }
      });
    })
  });
</script>