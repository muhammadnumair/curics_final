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
               Add New Prescription
            </h3>
         </div>
      </div>
      <form class="kt-form kt-form--label-right" method="POST" action="/account/prescription/create/{{$appointment->id}}">
         @csrf
         <input name="doctor_id" type="hidden" class="form-control" value="{{$appointment->doctor_id}}">
         <input name="clinic_id" type="hidden" class="form-control" value="{{$appointment->clinic_id}}">
         <div class="kt-portlet__body">
            <div class="form-group row">
               <div class="col-lg-4">
                  <label class="">Name:</label>
                  <input name="name" type="text" class="form-control" placeholder="Enter Patient's Name" value="{{$appointment->patient_name}}">
               </div>
               <div class="col-lg-4">
                  <label class="">Gender:</label>
                  <input name="gender" type="text" class="form-control" placeholder="Enter Patient's Gender" value="{{$appointment->patient != null ? $appointment->patient->gender : ''}}">
               </div>
               <div class="col-lg-4">
                  <label>Mobile Number:</label>
                  <input name="mobile" type="text" class="form-control" placeholder="Enter Patient's Mobile Number" value="{{$appointment->patient != null ? $appointment->patient_number : ''}}">
               </div>
            </div>
            <div class="form-group row">
               <div class="col-lg-4">
                  <label class="">Age:</label>
                  <input name="age" type="text" class="form-control" placeholder="Enter Patient's Age" id="age">
               </div>
               <div class="col-lg-4">
                  <label class="">Weight:</label>
                  <input name="weight" type="text" class="form-control" placeholder="Enter Patient's Weight" value="{{$appointment->patient != null ? $appointment->weight : null}}">
               </div>
               <div class="col-lg-4">
                  <label class="">Blood Pressure:</label>
                  <input name="blood_pressure" type="text" class="form-control" placeholder="Enter Patient's Blood Pressure" value="{{$appointment->patient != null ? $appointment->blood_pressure : null}}">
               </div>
            </div>
            <div class="form-group row">
               
               <div class="col-lg-4">
                  <label class="">Diabetes:</label>
                  <input name="diabetes" type="text" class="form-control" placeholder="Enter Patient's Diabetes" value="{{$appointment->patient != null ? $appointment->diabetes : null}}">
               </div>
            </div>
            <div class="form-group">
               <label for="exampleTextarea">Special Notes:</label>
               <textarea name="symptoms" class="form-control" rows="3">{{$appointment->patient != null ? $appointment->symptoms : ''}}</textarea>
            </div>
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
            <div class="alert alert-dark" role="alert">
               <div class="alert-text">
                  Diagonosis
               </div>
            </div>
            <div id="kt_repeater_1">
               <div class="form-group  row " id="kt_repeater_1">
                  <div data-repeater-list="diagonosis" class="col-lg-12">
                     <div data-repeater-item class="form-group row align-items-center">
                        <div class="col-md-5">
                           <div class="kt-form__group--inline">
                              <div class="kt-form__control">
                                 <input name="test_name" type="text" class="form-control" placeholder="Enter Test Name">
                              </div>
                           </div>
                           <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                        <div class="col-md-5">
                           <div class="kt-form__group--inline">
                              <div class="kt-form__control">
                                 <input name="instruction" type="text" class="form-control" placeholder="Enter Instruction">
                              </div>
                           </div>
                           <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                        <div class="col-md-2">
                           <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
                              <span>
                              <i class="la la-trash-o"></i>
                              <span>Delete</span>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-lg-4">
                     <div data-repeater-create="" class="btn btn btn-sm btn-brand btn-pill">
                        <span>
                        <i class="la la-plus"></i>
                        <span>Add</span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
            <div class="alert alert-dark" role="alert">
               <div class="alert-text">
                  Medicine
               </div>
            </div>
            <div id="kt_repeater_2">
               <div class="form-group  row" id="kt_repeater_2">
                  <div data-repeater-list="medicines" class="col-lg-12">
                     <div data-repeater-item class="form-group row align-items-center">
                        <div class="col-md-3">
                           <div class="kt-form__group--inline">
                              <div class="kt-form__control">
                                 <input name="medicine_name" type="text" class="form-control" placeholder="Enter Medicine Name">
                              </div>
                           </div>
                           <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                        <div class="col-md-3">
                           <div class="kt-form__group--inline">
                              <div class="kt-form__control">
                                 <input name="medicine_type" type="text" class="form-control" placeholder="Enter Medicine Type">
                              </div>
                           </div>
                           <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                        <div class="col-md-2">
                           <div class="kt-form__group--inline">
                              <div class="kt-form__control">
                                 <input name="medicine_instruction" type="text" class="form-control" placeholder="Enter Instruction">
                              </div>
                           </div>
                           <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                        <div class="col-md-2">
                           <div class="kt-form__group--inline">
                              <div class="kt-form__control">
                                 <input name="medicine_days" type="text" class="form-control" placeholder="Enter Days">
                              </div>
                           </div>
                           <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                        <div class="col-md-2">
                           <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
                              <span>
                              <i class="la la-trash-o"></i>
                              <span>Delete</span>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-lg-4">
                     <div data-repeater-create="" class="btn btn btn-sm btn-brand btn-pill">
                        <span>
                        <i class="la la-plus"></i>
                        <span>Add</span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="kt-portlet__foot">
               <div class="kt-form__actions kt-form__actions--right">
                  <button type="submit" class="btn btn-brand">Save & Print</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
               </div>
            </div>
            <div class="items" data-group="test">
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
   <!--begin::Page Scripts(used by this page) -->
		<script src="/assets/backend/app/custom/general/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>
   <script>
      var dob = new Date("<?php echo $appointment->patient->dateofbirth; ?>");
      //alert(dob);
      var today = new Date();
      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
      //alert(age);
      $('#age').val(age);
   </script>
   @endsection