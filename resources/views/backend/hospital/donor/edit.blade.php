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
                     Add New Donor
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/account/donor/update/{{$donor->id}}" method="post">
               @csrf
                <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $donor->name) }}" type="text" name="name">
                     @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Blood Group</label>
                        <select class="form-control m-select2" id="kt_select2_4" name="blood_group" style="width: 100%;">
                           <option value="A+" {{$donor->blood_group == 'A+' ? 'selected' : ''}}>A+</option>
                           <option value="A-" {{$donor->blood_group == 'A-' ? 'selected' : ''}}>A-</option>
                           <option value="B+" {{$donor->blood_group == 'B+' ? 'selected' : ''}}>B+</option>
                           <option value="B+" {{$donor->blood_group == 'B-' ? 'selected' : ''}}>B-</option>
                           <option value="AB+" {{$donor->blood_group == 'AB+' ? 'selected' : ''}}>AB+</option>
                           <option value="AB-"> {{$donor->blood_group == 'AB-' ? 'selected' : ''}}AB-</option>
                           <option value="O+" {{$donor->blood_group == 'O+' ? 'selected' : ''}}>O+</option>
                           <option value="O-" {{$donor->blood_group == 'O-' ? 'selected' : ''}}>O-</option>
                        </select>
                        @error('blood_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Age</label>
                     <input class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $donor->age) }}" type="text" name="age">
                     @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Last Donation Date</label>
                     <input type="text" class="form-control" id="kt_datepicker_1" readonly placeholder="Select Last Donation Date" name="last_donation_date" value="{{ old('last_donation_date', $donor->last_donation_date) }}"/>
                     @error('last_donation_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Phone</label>
                     <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $donor->phone) }}" type="text" name="phone">
                     @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Sex</label>
                     <input class="form-control @error('sex') is-invalid @enderror" value="{{ old('sex', $donor->sex) }}" type="text" name="sex">
                     @error('sex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $donor->email) }}" type="text" name="email">
                     @error('email')
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
                           <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Save Changes</button>
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