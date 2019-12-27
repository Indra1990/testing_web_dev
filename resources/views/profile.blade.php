<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('bootstrap-4/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-4/dist/css/custom.css')}}">
  </head>
  <body>
    {{-- boddy --}}
    <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          <div id="image"></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                      <table class="table table-borderless">
                        <tbody>
                          <tr>
                            <td><h5>Name</h5></td>
                            <td width="5">:</td>
                            <td><div id="name" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Gender</h5></td>
                            <td width="5">:</td>
                            <td><div id="gender" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Email</h5></td>
                            <td width="5">:</td>
                            <td><div id="email" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Age</h5></td>
                            <td width="5">:</td>
                            <td><div id="age" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Date of Birthday</h5></td>
                            <td width="5">:</td>
                            <td><div id="dob" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Phone / Cell</h5></td>
                            <td width="5">:</td>
                            <td><div id="phone_cell" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Address</h5></td>
                            <td width="5">:</td>
                            <td><div id="address" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>City</h5></td>
                            <td width="5">:</td>
                            <td><div id="city" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Country</h5></td>
                            <td width="5">:</td>
                            <td><div id="country" class="float-left"></div> </td>
                          </tr>
                          <tr>
                            <td><h5>Postal Code</h5></td>
                            <td width="5">:</td>
                            <td><div id="postal_code" class="float-left"></div> </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

    {{--  --}}
    <script type="text/javascript" src="{{asset('bootstrap-4/dist/js/jquery.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('bootstrap-4/dist/js/bootstrap.min.js')}}">
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        var app_url = "{{env('APP_URL')}}";
        $.ajax({
          header : {'csrftoken' : '{{csrf_token()}}'},
          type: 'GET',
          url: app_url + '/api/testing',
          dataType   :'JSON',
          success: function (response) {
            console.log(response.data_api);
            response.data_api.forEach(function(element){
              // var gender = element.gender;
              // var name = element.name;
              // var image = element.image;
              // var phone = element.phone;
              // var cell = element.cell;
              // var email = element.email;
              // var dob_date = element.dob_date;
              // var dob_age = element.dob_age;
              // var address = element.address;
              // var country = element.country;
              // var country = element.city;
              // var no_address = element.no_address;
              // var postal_code = element.postal_code;
              // var state  = element.state;
              $('#image').html('<img src="'+element.image+'">');
              $('#name').html('<span>'+element.name+'</span>');
              $('#gender').html('<span>'+element.gender+'</span>');
              $('#email').html('<span>'+element.email+'</span>');
              $('#age').html('<span>'+element.dob_age+'</span>');
              $('#dob').html('<span>'+element.dob_date+'</span>');
              $('#phone_cell').html('<span>'+element.phone+' / '+element.cell+'</span>');
              $('#address').html('<span>'+element.address+' '+element.no_address+', '+element.state+' </span>');
              $('#city').html('<span>'+element.city+'</span>');
              $('#country').html('<span>'+element.country+'</span>');
              $('#postal_code').html('<span>'+element.postal_code+'</span>');


            });

          },
          error: function(response) {
            console.log(response.responseText);
            // $('#msg_check').show();
          }
        });
        // console.log(gender);
      });
    </script>
  </body>
</html>
