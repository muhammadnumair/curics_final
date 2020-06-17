@extends('layouts.backend.layout')
@section('content')
<!-- begin::Body -->
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
         <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head">
               <div class="kt-portlet__head-label">
                  <span class="kt-portlet__head-icon">
                  <i class="kt-font-brand fa fa-id-badge"></i>
                  </span>
                  <h3 class="kt-portlet__head-title">
                     Edit Patient
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/account/doctorpatient/update/{{$patient->id}}" method="post">
               @csrf
               <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $patient->name) }}" type="text" placeholder="e.g 15" id="name" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Father Name</label>
                        <input class="form-control" type="text" value="{{ old('fathername', $patient->fathername) }}" placeholder="Enter Patient's Father Name" id="fathername" name="fathername">
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                        <input class="form-control" type="email" value="{{ old('email', $patient->email) }}" placeholder="name@example.com" id="email" name="email">
                  </div>
                  <div class="form-group">
                     <label>Gender</label>
                        <div class="kt-radio-inline">
                           <label class="kt-radio" >
                           <input type="radio"  name="gender" value="Male" {{$patient->gender == "Male" ? "checked" : ''}} >  Male
                           <span></span>
                           </label>
                           <label class="kt-radio">
                           <input type="radio" name="gender" value="Female" {{$patient->gender == "Female" ? "checked" : ''}}> Female
                           <span></span>
                           </label>
                           <label class="kt-radio">
                           <input type="radio" name="gender" value="Other" {{$patient->gender == "Other" ? "checked" : ''}}> Others
                           <span></span>
                           </label>
                        </div>
                  </div>
                  <div class="form-group">
                     <label>Present Address</label>
                        <input class="form-control @error('presentaddress') is-invalid @enderror" value="{{ old('presentaddress', $patient->presentaddress) }}"  type="text" placeholder="name@example.com" id="presentaddress" name="presentaddress">
                        @error('presentaddress')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Permanent Address</label>
                        <input class="form-control" type="text" placeholder="name@example.com"  value="{{ old('permanentaddress', $patient->permanentaddress) }}"  id="permanentaddress" name="permanentaddress">
                  </div>
                  <div class="form-group">
                     <label>Phone Number</label>
                        <input class="form-control  @error('phonenum') is-invalid @enderror" value="{{ old('phonenum' , $patient->phonenum) }}" type="tel" placeholder="+92xxx-xxxxxxx" id="phonenum" name="phonenum">
                        @error('phonenum')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Blood Group</label>
                        <select class="form-control m-select2" name="bloodgroup" id="kt_select2_1" style="width: 100%;">
                           <option disabled >Select Patient's Blood Group</option>
                           <option value= "A-" {{$patient->bloodgroup == "A-" ? "selected" : ''}}>A-</option>
                           <option value= "B+" {{$patient->bloodgroup  == "B+" ? "selected" : ''}}>B+</option>
                           <option value= "B-" {{$patient->bloodgroup  == "B-" ? "selected" : ''}}>B-</option>
                           <option value= "AB+" {{$patient->bloodgroup  == "AB+" ? "selected" : ''}}>AB+</option>
                           <option value= "AB-" {{$patient->bloodgroup  == "AB-" ? "selected" : ''}}>AB-</option>
                           <option value= "O+" {{$patient->bloodgroup  == "O+" ? "selected" : ''}}>O+</option>
                           <option value= "O-" {{$patient->bloodgroup  == "O-" ? "selected" : ''}}>O-</option>
                        </select>
                  </div>
                  <div class="form-group">
                     <label>Date of Birth</label>
                        <input type="text" class="form-control" value="{{ old('dateofbirth', $patient->dateofbirth) }}" id="kt_datepicker_1" readonly placeholder="Select Date Of Birth" name="dateofbirth"/>
                  </div>
               </div>
               <div class="kt-portlet__foot kt-portlet__foot--solid">
                  <div class="kt-form__actions">
                     <div class="row">
                        <div class="col-12">
                           <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Submit Patient</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <div class="kt-portlet__body kt-portlet__body--fit">
               <!--begin: Datatable -->
               <!--end: Datatable -->
            </div>
         </div>
      </div>
      <!-- end:: Content -->
      <!-- end:: Content -->
   </div>
   @endsection