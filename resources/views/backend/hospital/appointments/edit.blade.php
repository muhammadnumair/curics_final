@extends('layouts.backend.layout')
@section('content')
<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
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
   <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
      <!-- begin:: Content Head -->
      <div class="kt-subheader   kt-grid__item" id="kt_subheader">
         <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Edit Achievement</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <a href="/account/achievements" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10 text-right">
            Achievements List
            </a>
         </div>
      </div>
      <!-- end:: Content Head -->
      <!-- begin:: Content -->
      <!-- begin:: Content -->
      <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
         <div class="kt-portlet kt-portlet--mobile">
            <form class="kt-form kt-form--label-right" action="/account/achievement/update/{{$achievement->id}}" method="post">
               @csrf
                <div class="kt-portlet__body">
                  <div class="form-group row">
                     <label for="description" class="col-2 col-form-label">Achievement</label>
                     <div class="col-5">
                        <input class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $achievement->description) }}" type="text" placeholder="e.g 15" id="description" name="description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                  </div>
               </div>
               <div class="kt-portlet__foot">
                  <div class="kt-form__actions">
                     <div class="row">
                        <div class="col-2">
                        </div>
                        <div class="col-5">
                           <button type="submit" class="btn btn-success">Save Changes</button>
                           <button type="reset" class="btn btn-secondary">Cancel</button>
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