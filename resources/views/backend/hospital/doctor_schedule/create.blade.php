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
                  <i class="kt-font-brand flaticon2-calendar-5"></i>
                  </span>
                  <h3 class="kt-portlet__head-title">
                     Add New Schedule
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/account/hospital/doctor/schedule/create/{{$doctor->id}}" method="post">
               @csrf
               <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Available day</label><br>
                     <select class="form-control m-select2 @error('day') is-invalid @enderror" id="kt_select2_1" name="day" style="width: 100%;">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                     </select>
                     @error('day')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Available Date</label>
                     <input type="text" class="form-control" id="kt_datepicker_1" readonly placeholder="Select date" name="date" value="{{ old('date') }}"/>
                  </div>
                  <div class="form-group">
                     <label>Starting Time</label>
                     <input class="form-control" id="kt_timepicker_1" readonly="" placeholder="Select time" type="text" name="start_time">
                  </div>
                  <div class="form-group">
                     <label>Ending Time</label>
                     <input class="form-control" id="kt_timepicker_1" readonly="" placeholder="Select time" type="text" name="end_time">
                  </div>
                  <div class="form-group">
                     <label>Per Patient Time</label>
                     <input class="form-control @error('per_patient_time') is-invalid @enderror" value="{{ old('per_patient_time') }}" type="text" placeholder="e.g 15" id="per_patient_time" name="per_patient_time">
                     @error('per_patient_time')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group" style="margin-bottom: -15px;">
                     <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                     <input type="checkbox" name="open" value="1"> Open Clinic On This Day
                     <span></span>
                     </label>
                  </div>
               </div>
               <div class="kt-portlet__foot kt-portlet__foot--solid">
                  <div class="kt-form__actions">
                     <div class="row">
                        <div class="col-12">
                           <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Submit Schedule</button>
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