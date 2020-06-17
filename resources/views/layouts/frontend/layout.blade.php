<?php 
   $currr_city = null;
   if(Session::get('city')){
      $currr_city = Session::get('city');
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>
      @if(isset($title))
      {{$title}} 
      @else
      We Take Care For Your Health
      @endif
      - Curics
      </title>
      <!-- Favicons-->
      <link rel="shortcut icon" href="/assets/frontend/img/favicon.ico" type="image/x-icon">
      <!-- GOOGLE WEB FONT -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
      <!-- BASE CSS -->
      <link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css">
      <link href="/assets/frontend/css/bootstrap.min.css" rel="stylesheet">
      <link href="/assets/frontend/css/menu.css" rel="stylesheet">
      <link href="/assets/frontend/css/vendors.css" rel="stylesheet">
      <link href="/assets/frontend/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
      <!-- SPECIFIC CSS -->
      <link href="/assets/frontend/css/date_picker.css" rel="stylesheet">
      <!-- YOUR CUSTOM CSS -->
      <link href="/assets/frontend/css/custom.css" rel="stylesheet">
      <link href="http://www.ansonika.com/findoctor/css/style.css" rel="stylesheet">
      <style>
         @font-face {
         font-family: 'mher';
         src: url('http://csalt.itu.edu.pk/urdufont/Mehr Nastaliq Web version 1.0 beta.ttf')  format('opentype');
         }
         @font-face {
         font-family: 'nafees';
         src: url('http://csalt.itu.edu.pk/urdufont/nafees.ttf')  format('truetype');
         }
         .cta_subscribe .btn_1, .cta_subscribe a.btn_1 { border: none; width: 220px;}
         .navbar-default{background:#3285D1;border-color: #3285D1;}
         .navbar-default .navbar-nav > li > a{color:#FFF;}
         .nav > li > a{margin:15px; font-size: 17px; color:#FFF;}
         .nav .open > a, .nav .open > a:hover, 
         .nav .open > a:focus,
         .nav > li > a:hover, .nav > li > a:focus{background-color:transparent !important;}
         .navbar-brand{    
         margin: 15px !important;
         padding: 13px !important;
         color: #fff !important;
         font-size: 2em !important;
         font-weight: bold !Important;
         }
         .navbar-toggle{margin-top:20px !important;}
         .dropdown-menu{background:#fff !important;}
         .navbar-login
         {
         width: 350px;
         padding: 10px;
         padding-bottom: 0px;
         }
         .navbar-login-session
         {
         padding: 10px;
         padding-bottom: 0px;
         padding-top: 0px;
         }
         .icon-size
         {
         font-size: 87px;
         }
      </style>
   </head>
   <body>
      <div id="preloader" class="Fixed">
         <div data-loader="circle-side"></div>
      </div>
      <!-- /Preload-->
      <div id="page">
         <header style="background-color: #white;border-bottom: 0px; padding: 5px;" class="">
            <a href="#menu" class="btn_mobile">
               <div class="hamburger hamburger--spin" id="hamburger">
                  <div class="hamburger-box">
                     <div class="hamburger-inner"></div>
                  </div>
               </div>
            </a>
            <!-- /btn_mobile-->
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-6">
                     <div id="logo" style="display: inline-block;">
                        <a href="{{URL::to('/')}}">
                        <img src="/assets/backend/media/logo-dark.png" style="width: 98px;"/>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-8 col-6">
                     <ul id="top_access" style="top: 5px;">
                        @if(!Auth::user())
                        <li><a href="/login" class="btn btn-danger" style="color: white; font-size: 14px;">Login</a></li>
                        @endif

                        @if(Session::get('patient') != null)
                        <ul class="nav navbar-nav navbar-right" style=" margin-top: 5px; ">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <span class="glyphicon glyphicon-user"></span> 
                              <strong>{{Session::get('patient')->name}}</strong>
                              <span class="glyphicon glyphicon-chevron-down"></span>
                              </a>
                              <ul class="dropdown-menu">
                                 <li>
                                    <div class="navbar-login">
                                       <div class="row">
                                          <div class="col-lg-4">
                                             <img src="{{Session::get('patient')->user != null && Session::get('patient')->user->profile_picture != null ? Session::get('patient')->user->profile_picture : '/storage/patient.png'}}" class="rounded-circle" style="width: 100%; max-height: 100px; max-width: 100px;">
                                          </div>
                                          <div class="col-lg-8">
                                             <p class="text-left" style="margin-bottom: 5px;"><strong>{{Session::get('patient')->name}}</strong></p>
                                             <p class="text-left small" style="margin-bottom: 15px;">{{Session::get('patient')->user->email}}</p>
                                             <p class="text-left">
                                                <a href="{{URL::to('/')}}/logout" class="btn btn-danger btn-sm" style="color: white;">Logout</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="mt-4">
                                    <div class="navbar-login navbar-login-session">
                                       <div class="row">
                                          <div class="col-lg-12">
                                             <p>
                                                <a href="/patient/dashboard" class="btn btn-primary btn-block" style="color: white;">My Dashboard</a>
                                                <a href="#" class="btn btn-success btn-block" style="color: white;">Change Password</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                        @endif

                        @if(Session::get('doctor') != null)
                        <ul class="nav navbar-nav navbar-right" style=" margin-top: 5px; ">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <span class="glyphicon glyphicon-user"></span> 
                              <strong>{{Session::get('doctor')->name}}</strong>
                              <span class="glyphicon glyphicon-chevron-down"></span>
                              </a>
                              <ul class="dropdown-menu">
                                 <li>
                                    <div class="navbar-login">
                                       <div class="row">
                                          <div class="col-lg-5">
                                             <img src="{{Session::get('doctor')->user != null && Session::get('doctor')->user->profile_picture != null ? '/storage/'.Session::get('doctor')->user->profile_picture : '/storage/nouser.png'}}" class="rounded-circle" style="width: 100%; max-height: 100px; max-width: 100px;">
                                          </div>
                                          <div class="col-lg-7">
                                             <p class="text-left" style="margin-bottom: 5px;"><strong>{{Session::get('doctor')->name}}</strong></p>
                                             <p class="text-left small" style="margin-bottom: 15px;">{{Session::get('doctor')->user->email}}</p>
                                             <p class="text-left">
                                                <a href="{{URL::to('/')}}/logout" class="btn btn-danger btn-sm" style="color: white;">Logout</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="mt-4">
                                    <div class="navbar-login navbar-login-session">
                                       <div class="row">
                                          <div class="col-lg-12">
                                             <p>
                                                <a href="/account/{{Session::get('clinic') != null ? 'dashboard' : 'clinics'}}" class="btn btn-primary btn-block" style="color: white;">My Dashboard</a>
                                                <a href="#" class="btn btn-success btn-block" style="color: white;">Change Password</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                        @endif
                        @if(Auth::user() != null && Auth::user()->userrole == "hospital")
                        <ul class="nav navbar-nav navbar-right" style=" margin-top: 5px; ">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <span class="glyphicon glyphicon-user"></span> 
                              <strong>{{Auth::user()->name}}</strong>
                              <span class="glyphicon glyphicon-chevron-down"></span>
                              </a>
                              <ul class="dropdown-menu">
                                 <li>
                                    <div class="navbar-login">
                                       <div class="row">
                                          <div class="col-lg-5">
                                             <img src="{{Auth::user() != null && Auth::user()->profile_picture != null ? '/storage/'.Auth::user()->profile_picture : '/storage/nouser.png'}}" class="rounded-circle" style="width: 100%; max-height: 100px; max-width: 100px;">
                                          </div>
                                          <div class="col-lg-7">
                                             <p class="text-left" style="margin-bottom: 5px;"><strong>{{Auth::user()->name}}</strong></p>
                                             <p class="text-left small" style="margin-bottom: 15px;">{{Auth::user()->email}}</p>
                                             <p class="text-left">
                                                <a href="{{URL::to('/')}}/logout" class="btn btn-danger btn-sm" style="color: white;">Logout</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="mt-4">
                                    <div class="navbar-login navbar-login-session">
                                       <div class="row">
                                          <div class="col-lg-12">
                                             <p>
                                                <a href="/account/hospital/dashboard" class="btn btn-primary btn-block" style="color: white;">My Dashboard</a>
                                                <a href="#" class="btn btn-success btn-block" style="color: white;">Change Password</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                        @endif
                        @if(Auth::user() != null && Auth::user()->userrole == "admin")
                        <ul class="nav navbar-nav navbar-right" style=" margin-top: 5px; ">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <span class="glyphicon glyphicon-user"></span> 
                              <strong>{{Auth::user()->name}}</strong>
                              <span class="glyphicon glyphicon-chevron-down"></span>
                              </a>
                              <ul class="dropdown-menu">
                                 <li>
                                    <div class="navbar-login">
                                       <div class="row">
                                          <div class="col-lg-5">
                                             <img src="{{Auth::user() != null && Auth::user()->profile_picture != null ? '/storage/'.Auth::user()->profile_picture : '/storage/nouser.png'}}" class="rounded-circle" style="width: 100%; max-height: 100px; max-width: 100px;">
                                          </div>
                                          <div class="col-lg-7">
                                             <p class="text-left" style="margin-bottom: 5px;"><strong>{{Auth::user()->name}}</strong></p>
                                             <p class="text-left small" style="margin-bottom: 15px;">{{Auth::user()->email}}</p>
                                             <p class="text-left">
                                                <a href="{{URL::to('/')}}/logout" class="btn btn-danger btn-sm" style="color: white;">Logout</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="mt-4">
                                    <div class="navbar-login navbar-login-session">
                                       <div class="row">
                                          <div class="col-lg-12">
                                             <p>
                                                <a href="/admin/hospitals" class="btn btn-primary btn-block" style="color: white;">My Dashboard</a>
                                                <a href="#" class="btn btn-success btn-block" style="color: white;">Change Password</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                        @endif
                     </ul>
                     <nav id="menu" class="main-menu">
                        <ul>
                           <li>
                              <span><a href="#0">Find a Doctor</a></span>
                              <ul>
                                 <li><a href="/all-cities">By City</a></li>
                                 <li><a href="/all-specializations">By Specialization</a></li>
                                 <li><a href="/all-diseases"> By Disease</a></li>
                              </ul>
                           </li>
                           <li><span><a href="#">Forum</a></span></li>
                           <li><span><a href="#">Blog</a></span></li>
                           <li>
                              <span><a href="#0">Register Yourself</a></span>
                              <ul>
                                 <li><a href="/register/doctor">As Doctor</a></li>
                                 <li><a href="/register/patient">As Patient</a></li>
                              </ul>
                           </li>
                        </ul>
                     </nav>
                     <!-- /main-menu -->
                  </div>
               </div>
            </div>
            <!-- /container -->
         </header>
         @yield('content')
         <footer>
            <div class="container margin_60_35">
               <div class="row">
                  <div class="col-lg-3 col-md-12">
                     <p>
                        <a href="index-2.html" title="Findoctor">
                        <img src="/assets/backend/media/logo-dark.png" style="width: 135px;" data-retina="true" alt="" width="163" height="36" class="img-fluid">
                        </a>
                     </p>
                  </div>
                  <div class="col-lg-3 col-md-4">
                     <h5>About</h5>
                     <ul class="links">
                        <li><a href="#0">About us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="#0">FAQ</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-4">
                     <h5>Useful links</h5>
                     <ul class="links">
                        <li><a href="#0">Doctors</a></li>
                        <li><a href="#0">Clinics</a></li>
                        <li><a href="#0">Specialization</a></li>
                        <li><a href="#0">Join as a Doctor</a></li>
                        <li><a href="#0">Download App</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-4">
                     <h5>Contact with Us</h5>
                     <ul class="contacts">
                        <li><a href="mailto:info@findoctor.com"><i class="icon_mail_alt"></i> help@curics.com</a></li>
                     </ul>
                     <div class="follow_us">
                        <h5>Follow us</h5>
                        <ul>
                           <li><a href="https://www.facebook.com/curicspk" target="_blank"><i class="social_facebook"></i></a></li>
                           <li><a href="https://twitter.com/curicspk" target="_blank"><i class="social_twitter"></i></a></li>
                           <li><a href="https://www.linkedin.com/company/curicspk" target="_blank"><i class="social_linkedin"></i></a></li>
                           <li><a href="https://www.instagram.com/curicspk" target="_blank"><i class="social_instagram"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!--/row-->
               <hr>
               <div class="row">
                  <div class="col-md-8">
                     <ul id="additional_links">
                        <li><a href="#0">Terms and conditions</a></li>
                        <li><a href="#0">Privacy</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <div id="copy">©2019 Curics</div>
                  </div>
               </div>
            </div>
         </footer>
         <!--/footer-->
      </div>
      <!-- page -->
      <div id="toTop"></div>
      <!-- Back to top button -->
      <!-- COMMON SCRIPTS -->
      <script src="/assets/frontend/js/jquery-2.2.4.min.js"></script>
      <script src="/assets/frontend/js/common_scripts.min.js"></script>
      <script src="/assets/frontend/js/functions.js"></script>
      <script src="/assets/frontend/js/markerclusterer.js"></script>
      <script src="/assets/frontend/js/infobox.js"></script>
      <script src="/assets/frontend/js/bootstrap-datepicker.js"></script>
      <script src="http://maps.google.com/maps/api/js?key=AIzaSyD7wcIGom7LFBrCea9RFCQhO8W4F_YKUs8"></script>
      <!-- SPECIFIC SCRIPTS -->
      <script src="/assets/frontend/js/jquery.cookiebar.js"></script>
      <script>
         $(document).ready(function(){
         'use strict';
         $.cookieBar({
            fixed: true
         });
         });
      </script>
      <script>
         $('#calendar').datepicker({
         	todayHighlight: true,
         	daysOfWeekDisabled: [0],
         	weekStart: 1,
         	format: "yyyy-mm-dd",
         	datesDisabled: ["2017/10/20", "2017/11/21", "2017/12/21", "2018/01/21", "2018/02/21", "2018/03/21"],
         });
      </script>
      <script>
         var link = "/doctor/booking/<?php if(isset($doctor)){echo $doctor->alias;} ?>/"+ $("#select_clinic option:selected").val();
         $("#book_btn").attr("href", link);
         $("#time_slots").html("<p>Available Time Slots Will Show Here</p>")
         $('input[name=date]').change(function(){
            var value = $( 'input[name=date]:checked' ).val();
            //alert(<?php if(isset($clinic)){echo $clinic->id;} ?>);
            $.ajax({
               type:'POST',
               url:'/gettimeslots',
               data: {_token: '<?php echo csrf_token() ?>', date: value, doctor_id: '<?php if(isset($doctor)){echo $doctor->id;} ?>', clinic_id: '<?php if(isset($doctor_clinic)){echo $doctor_clinic->clinic->id;} ?>'},
               success:function(data) {
                  $("#time_slots").html(data.slots);
               }
            });
         });
         
         // $('#select_clinic').change(function() {
         //    //var link = "/doctor/booking/"+ <?php if(isset($doctor)){echo $doctor->alias;} ?> this.value + "/" + sel.value;
         //    alert("link");
         // });
         
         function selectClinic(sel)
         {
            var link = "/doctor/booking/<?php if(isset($doctor)){echo $doctor->alias;} ?>/"+sel.value;
            $("#book_btn").attr("href", link);
         }
      </script> 
      <script>
         var x=document.getElementById("demo");
         if (navigator.geolocation){
               navigator.geolocation.getCurrentPosition(showPosition,showError);
            }
            else{
               x.innerHTML="Geolocation is not supported by this browser.";
            }
         
         function showPosition(position){
            lat=position.coords.latitude;
            lon=position.coords.longitude;
            //displayLocation(lat,lon);
            getUserLocation1();
         }
         
         function showError(error){
            switch(error.code){
               case error.PERMISSION_DENIED:
                     x.innerHTML="User denied the request for Geolocation."
               break;
               case error.POSITION_UNAVAILABLE:
                     x.innerHTML="Location information is unavailable."
               break;
               case error.TIMEOUT:
                     x.innerHTML="The request to get user location timed out."
               break;
               case error.UNKNOWN_ERROR:
                     x.innerHTML="An unknown error occurred."
               break;
            }
         }
         
         function getUserLocation1(){
            var curr_city = "<?php echo $currr_city;?>";
            
            $.ajax({
               type: "POST", 
               url: "http://ip-api.com/json/",
               success: function(response) {
                     $.ajax({
                        type: "POST", 
                        url: "/save/user_location",
                        data: {_token: '<?php echo csrf_token() ?>', country: "Pakistan", city: response['city']},
                        success: function(response) {
                           if(curr_city){
                              
                           }else{
                              $('#user_location').html(response['city']);
                           }
                        }
                     });
                  }
               });
         }
         
         var city1;
         var country1;
         function displayLocation(latitude,longitude){
            var geocoder;
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(latitude, longitude);
            alert("chala 2");
            geocoder.geocode(
               {'latLng': latlng}, 
               function(results, status) {
                     if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                           var add= results[0].formatted_address ;
                           var  value=add.split(",");
         
                           count=value.length;
                           country=value[count-1];
                           state=value[count-2];
                           
                           if(value[count-3] == null){
                              city="all";
                           }else{
                              city=value[count-3];
                           }
                           
                           alert("chala 1");
                           var user_location = document.getElementById('user_location');
                           user_location.innerHTML = city + ", " + "Pakistan";

                           alert(city);

                           $.ajax({
                              type: "POST", 
                              url: "/save/user_location",
                              data: {_token: '<?php echo csrf_token() ?>', country: "Pakistan", city: city},
                                 success: function(response) {
                                 //alert(response);
                              }
                           });
                           
                        }
                        else  {
                           console.log("address not found");
                        }
                     }
                     else {
                        console.log("Geocoder failed due to: " + status);
                     }
               }
            );
         }
         
      </script>
   </body>
</html>