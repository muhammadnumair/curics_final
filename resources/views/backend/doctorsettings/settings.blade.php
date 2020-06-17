@extends('layouts.backend.layout') @section('content')
<!-- begin::Body -->
<style>
   .m-list-badge {
   display: table;
   }
   .m-list-badge .m-list-badge__label {
   display: table-cell;
   padding-right: 1.43rem;
   font-size: 1.3rem;
   vertical-align: middle;
   font-weight: 600;
   }
   .m-list-badge .m-list-badge__items {
   display: table-cell;
   vertical-align: middle;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item {
   -webkit-border-radius: 1.43rem;
   -moz-border-radius: 1.43rem;
   -ms-border-radius: 1.43rem;
   -o-border-radius: 1.43rem;
   border-radius: 1.43rem;
   padding: 0.33rem 1.14rem 0.33rem 1.14rem;
   font-size: 0.95rem;
   font-weight: 500;
   margin-right: 0.4rem;
   text-decoration: none;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item {
   color: #716aca;
   background-color: #ffffff;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item:hover {
   color: #ffffff;
   background-color: #716aca;
   }
   .m-list-badge.m-list-badge--light-bg .m-list-badge__items .m-list-badge__item {
   border: 1px solid #716aca;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--brand {
   color: #ffffff;
   background-color: #716aca;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--brand:hover {
   background: #4d44bd;
   color: #ffffff;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--metal {
   color: #ffffff;
   background-color: #c4c5d6;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--metal:hover {
   background: #a6a7c1;
   color: #ffffff;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--light {
   color: #282a3c;
   background-color: #ffffff;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--light:hover {
   background: #e6e6e6;
   color: #282a3c;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--accent {
   color: #ffffff;
   background-color: #00c5dc;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--accent:hover {
   background: #0097a9;
   color: #ffffff;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--focus {
   color: #ffffff;
   background-color: #9816f4;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--focus:hover {
   background: #7c0acd;
   color: #ffffff;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--primary {
   color: #ffffff;
   background-color: #5867dd;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--primary:hover {
   background: #2e40d4;
   color: #ffffff;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--success {
   color: #ffffff;
   background-color: #34bfa3;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--success:hover {
   background: #299781;
   color: #ffffff;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--info {
   color: #ffffff;
   background-color: #36a3f7;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--info:hover {
   background: #0a8cf0;
   color: #ffffff;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--warning {
   color: #111111;
   background-color: #ffb822;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--warning:hover {
   background: #eea200;
   color: #111111;
   }
   .m-list-badge .m-list-badge__items .m-list-badge__item.m-list-badge__item--danger {
   color: #ffffff;
   background-color: #f4516c;
   }
   .m-list-badge .m-list-badge__items a.m-list-badge__item.m-list-badge__item--danger:hover {
   background: #f12143;
   color: #ffffff;
   }
   .profile-pic {
      max-width: 200px;
      max-height: 200px;
      display: block;
   }

   .file-upload {
      display: none;
   }
</style>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">
   <!-- begin:: Page -->
   <!-- begin:: Header Mobile -->
   <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
      <div class="kt-header-mobile__logo">
         <a href="index.html">
         <img alt="Logo" src="../assets/media/logos/logo-light.png" />
         </a>
      </div>
      <div class="kt-header-mobile__toolbar">
         <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
         <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
         <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
      </div>
   </div>
   <!-- end:: Header Mobile -->
   <div class="kt-grid kt-grid--hor kt-grid--root">
   <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
   @include('layouts.backend.sidebar')
   <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
   @include('layouts.backend.header_top')
   <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5">
   <!-- begin:: Content -->
   <!-- begin:: Content -->
   <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="kt_content">
      <div class="accordion  accordion-toggle-arrow" id="accordionExample4">
         <div class="card">
            <div class="card-header" id="headingOne4">
               <div class="card-title" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                  <i class="flaticon2-layers-1"></i> General Settings
               </div>
            </div>
            <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample4" style="">
               <div class="card-body">
                  <form class="kt-form kt-form--label-right" action="/account/settings/general" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="kt-portlet__body">
                        <div class="form-group">
                           <img style=" width: 9.5rem; height: 9.5rem; border-radius: 10px; margin-bottom: 10px; " class="profile-pic" src="{{Session::get('doctor')->user != null && Session::get('doctor')->user->profile_picture != null ? '/storage/'.Session::get('doctor')->user->profile_picture : '/storage/nouser.png'}}" />
                           <div class="upload-button btn btn-primary">Upload Image</div>
                           <input type="file" class="file-upload" id="profile_picture" name="profile_picture">
                        </div>
                        <br>
                        <div class="form-group">
                           <label>Full Name</label>
                           <input value="{{ old('name', $doctor->name) }}" class="form-control @error('name') is-invalid @enderror" value="" type="text" name="name"> @error('name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <div class="form-group">
                           <label>About</label>
                           <textarea name="about" class="form-control" rows="3">{{ old('about', $doctor->about) }}</textarea>
                           @error('about')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <div class="form-group">
                           <label>Designation</label>
                           <input class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation', $doctor->designation) }}" type="text" name="designation"> @error('designation')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <div class="form-group">
                           <label>Experience Years</label>
                           <input class="form-control @error('experience_years') is-invalid @enderror" value="{{ old('experience_years', $doctor->experience_years) }}" type="text" name="experience_years"> @error('experience_years')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <div class="form-group">
                           <label>General Address</label>
                           <input class="form-control @error('doctor_address') is-invalid @enderror" value="{{ old('doctor_address', $doctor->doctor_address) }}" type="text" name="doctor_address"> @error('doctor_address')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <div class="form-group">
                           <label>Address Latitude</label>
                           <input class="form-control @error('doctor_address_latitude') is-invalid @enderror" value="{{ old('doctor_address_latitude', $doctor->doctor_address_latitude) }}" type="text" name="doctor_address_latitude"> @error('doctor_address_latitude')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <div class="form-group">
                           <label>Address Longitude</label>
                           <input class="form-control @error('doctor_address_longitude') is-invalid @enderror" value="{{ old('doctor_address_longitude', $doctor->doctor_address_longitude) }}" type="text" name="doctor_address_longitude"> @error('doctor_address_longitude')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <div class="form-group">
                           <label>City</label>
                           <br>
                           <select class="form-control m-select2" id="kt_select2_1" name="city" style="width: 100%;">
                           @foreach($cities as $city)
                           <option value="{{$city->id}}" {{$doctor->city_id == $city->id ? "selected" : ''}}>{{$city->name}}</option>
                           @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Gender</label>
                           <br>
                           <select class="form-control m-select2" id="kt_select2_1" name="gender" style="width: 100%;">
                           <option value="male" {{$doctor->gender == "male" ? "selected" : ''}}>Male</option>
                           <option value="female" {{$doctor->gender == "female" ? "selected" : ''}}>Female</option>
                           </select>
                        </div>
                        <label class="kt-checkbox">
                        <input type="checkbox" name="online_presense" value="0" {{$doctor->online_presense == 0 ? 'checked' : ''}}> Make Online Presence Private
                        <span></span>
                        </label>
                        <div class="mt-3"></div>
                     </div>
                     <div class="kt-portlet__foot kt-portlet__foot--solid">
                        <div class="kt-form__actions">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Save Changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header" id="headingTwo4">
               <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                  <i class="flaticon2-copy"></i> Clinic Settings
               </div>
            </div>
            <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordionExample4">
               <div class="card-body">
                  <form enctype="multipart/form-data" class="kt-form kt-form--label-right" action="/account/settings/clinic" method="post">
                     @csrf
                     <div class="kt-portlet__body">
                        <div class="form-group">
                           <label>General Clinic Fee</label>
                           <input value="{{ old('doctor_fee', $clinic->doctor_fee) }}" class="form-control @error('doctor_fee') is-invalid @enderror" value="" type="text" name="doctor_fee"> @error('doctor_fee')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span> @enderror
                        </div>
                        <label class="kt-checkbox">
                        <input type="checkbox" name="clinic_active" value="1" {{$clinic->clinic_active == 1 ? 'checked' : ''}}> Active
                        <span></span>
                        </label>
                        <div class="mt-3"></div>
                     </div>
                     <div class="kt-portlet__foot kt-portlet__foot--solid">
                        <div class="kt-form__actions">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Save Changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="card mb-5">
            <div class="card-header" id="headingThree4">
               <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                  <i class="flaticon2-bell-alarm-symbol"></i> Speciality Settings
               </div>
            </div>
            <div id="collapseThree4" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample4">
               <div class="card-body">
                  <div class="m-list__content">
                     <div class="m-list-badge m--margin-bottom-20 mb-5">
                        <div class="m-list-badge__items" id="spec_items">
                           @if(count($doctor->specializations) > 0) @foreach($doctor->specializations as $spe)
                           <a href="#" class="m-list-badge__item m-list-badge__item--brand" id="spec_item_{{$spe->specialization->id}}">
                           {{$spe->specialization->name_english}}  <i onclick="removeSpecialization({{$spe->specialization->id}})" class="fas fa-backspace"></i>
                           </a> 
                           @endforeach 
                           @else
                           <p>No Specialization Added Yet</p>
                           @endif
                        </div>
                     </div>
                  </div>
                  <form method="POST" id="specialization_form">
                     <h6>Add New Specialization</h6>
                     <select class="form-control m-select2" id="kt_select2_1" name="specialization_id" style="width: 100%;">
                        @foreach($specializations as $specialization)
                        <option value="{{$specialization->id}}">{{$specialization->name_english}}</option>
                        @endforeach
                     </select>
                     <div class="kt-portlet__foot kt-portlet__foot--solid mt-3">
                        <div class="kt-form__actions">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Add Speciality</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end:: Content -->
      <!-- end:: Content -->
   </div>
   <script>
    function removeSpecialization(id){
        $.ajax({
                              type: "POST",
                              url: "/account/settings/remove_specialization",
                              data: {_token: '<?php echo csrf_token() ?>', specialization: id},
                              success: function(data) {
                                    $('#spec_item_'+id).remove();
                                    var error = "Specialization Removed!";
                                    if(error != "")
                                      {
                                          toastr.options = {
                                          "closeButton": true,
                                          "debug": false,
                                          "newestOnTop": false,
                                          "progressBar": true,
                                          "positionClass": "toast-top-right",
                                          "preventDuplicates": false,
                                          "onclick": null,
                                          "showDuration": "300",
                                          "hideDuration": "1000",
                                          "timeOut": "5000",
                                          "extendedTimeOut": "1000",
                                          "showEasing": "swing",
                                          "hideEasing": "linear",
                                          "showMethod": "fadeIn",
                                          "hideMethod": "fadeOut"
                                          };
                                          toastr.error(error);
                                    }
                              }
                          });
    }

      $(document).ready(function(){
          $("#specialization_form").submit(function() {
              event.preventDefault();
                          var specialization = $("select[name=specialization_id]").val();
                          //alert(specialization);
                          $.ajax({
                              type: "POST",
                              url: "/account/settings/save_specialization",
                              data: {_token: '<?php echo csrf_token() ?>', specialization: specialization},
                              success: function(data) {
                                  //alert(data);
                                  if(data != "already"){
                                      var item = "<a href='#' class='m-list-badge__item m-list-badge__item--brand' id='spec_item_"+specialization+"'>"+data+"  <i onclick='removeSpecialization("+specialization+")' class='fas fa-backspace'></i></a>"
                                      $('#spec_items').append(item);
                                  }else{
                                      var error = "Specialization already added!";
                                      if(error != "")
                                      {
                                          toastr.options = {
                                          "closeButton": true,
                                          "debug": false,
                                          "newestOnTop": false,
                                          "progressBar": true,
                                          "positionClass": "toast-top-right",
                                          "preventDuplicates": false,
                                          "onclick": null,
                                          "showDuration": "300",
                                          "hideDuration": "1000",
                                          "timeOut": "5000",
                                          "extendedTimeOut": "1000",
                                          "showEasing": "swing",
                                          "hideEasing": "linear",
                                          "showMethod": "fadeIn",
                                          "hideMethod": "fadeOut"
                                          };
                                          toastr.error(error);
                                      }
                                  }
                              }
                          });
      
      
                      });
              });
   </script>
   <script>
      $(document).ready(function() {
         var readURL = function(input) {
            if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                     $('.profile-pic').attr('src', e.target.result);
               }

               reader.readAsDataURL(input.files[0]);
            }
         }
         $(".file-upload").on('change', function(){
            readURL(this);
         });

         $(".upload-button").on('click', function() {
            $(".file-upload").click();
         });
      });
   </script>
   @endsection