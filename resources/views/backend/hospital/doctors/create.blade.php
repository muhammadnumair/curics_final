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
                     Add New Doctor
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/account/hospital/doctor/create" method="post">
               @csrf
               <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Doctor Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" id="name" name="name">
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="email" name="email">
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password" id="password" name="password">
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Mobile Phone</label>
                     <input class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" type="text" id="mobile" name="mobile">
                     @error('mobile')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Doctor Fee</label>
                     <input class="form-control @error('doctor_fee') is-invalid @enderror" value="{{ old('doctor_fee') }}" type="text" id="doctor_fee" name="doctor_fee">
                     @error('doctor_fee')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group" id="companies">
                        <label>Departments</label><br>
                        <select class="form-control m-select2" id="kt_select2_4" name="department_id" style="width: 100%;">
                           @foreach($departments as $department)
                              <option value="{{$department->id}}">{{$department->department_name}}</option>
                           @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                     <label>Clinic Comission</label>
                     <input class="form-control @error('clinic_comission') is-invalid @enderror" value="{{ old('clinic_comission') }}" type="text" id="clinic_comission" name="clinic_comission">
                     @error('clinic_comission')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="kt-portlet__foot kt-portlet__foot--solid">
                  <div class="kt-form__actions">
                     <div class="row">
                        <div class="col-12">
                           <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Submit Doctor</button>
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