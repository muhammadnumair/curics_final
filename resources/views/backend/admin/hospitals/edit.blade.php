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
                     Add New Hospital
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/admin/hospital/update/{{$hospital->id}}" method="post">
               @csrf
               <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Title</label>
                     <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $hospital->name) }}">
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $hospital->email) }}">
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password', $hospital->password) }}">
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Address</label>
                     <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $hospital->address) }}">
                     @error('address')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Phone</label>
                     <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $hospital->phone) }}">
                     @error('phone')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Package</label>
                     <select class="form-control m-select2" name="package_id" id="kt_select2_1" style="width: 100%;">
                     @foreach($packages as $p)
                        <option value="{{$p->id}}" {{$hospital->package_id === $p->id ? "selected" : ""}}>{{$p->package_name}}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group row">
								<label class="col-1 col-form-label">Active</label>
								<div class="col-11">
									<span class="kt-switch kt-switch--sm">
									<label>
									<input type="checkbox"  {{$hospital->status == 1 ? 'checked' : ''}} name="status" value="1">
									<span></span>
									</label>
									</span>
								</div>
							</div>
               </div>
               <div class="kt-portlet__foot kt-portlet__foot--solid">
                  <div class="kt-form__actions">
                     <div class="row">
                        <div class="col-12">
                           <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Add Hospital</button>
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