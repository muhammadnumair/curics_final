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
                  <i class="kt-font-brand fa fa-star"></i>
                  </span>
                  <h3 class="kt-portlet__head-title">
                     Update Blood Bank
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/account/bloodBank/update/{{$blood_bank->id}}" method="post">
               @csrf
                <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Blood Group</label>
                        <select class="form-control m-select2" id="kt_select2_4" name="blood_group" style="width: 100%;">
                           <option value="A+" {{$blood_bank->blood_group == 'A+' ? 'selected' : ''}}>A+</option>
                           <option value="A-" {{$blood_bank->blood_group == 'A-' ? 'selected' : ''}}>A-</option>
                           <option value="B+" {{$blood_bank->blood_group == 'B+' ? 'selected' : ''}}>B+</option>
                           <option value="B+" {{$blood_bank->blood_group == 'B-' ? 'selected' : ''}}>B-</option>
                           <option value="AB+" {{$blood_bank->blood_group == 'AB+' ? 'selected' : ''}}>AB+</option>
                           <option value="AB-"> {{$blood_bank->blood_group == 'AB-' ? 'selected' : ''}}AB-</option>
                           <option value="O+" {{$blood_bank->blood_group == 'O+' ? 'selected' : ''}}>O+</option>
                           <option value="O-" {{$blood_bank->blood_group == 'O-' ? 'selected' : ''}}>O-</option>
                        </select>
                        @error('blood_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Status</label>
                     <input class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $blood_bank->status) }}" type="text" name="status">
                     @error('status')
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
                           <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Submit</button>
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