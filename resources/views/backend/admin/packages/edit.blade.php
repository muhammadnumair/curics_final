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
                     Edit Package
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/admin/package/update/{{$package->id}}" method="post">
               @csrf
               <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Package Name</label>
                     <input class="form-control @error('package_name') is-invalid @enderror" id="package_name" name="package_name" value="{{ old('package_name', $package->package_name) }}">
                     @error('package_name')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Patient Limit</label>
                     <input value="{{ old('patient_limit', $package->patient_limit) }}" type="text" class="form-control @error('patient_limit') is-invalid @enderror" id="patient_limit" name="patient_limit">
                     @error('patient_limit')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Doctor Limit</label>
                     <input value="{{ old('doctor_limit', $package->doctor_limit) }}" type="text" class="form-control @error('doctor_limit') is-invalid @enderror" id="doctor_limit" name="doctor_limit">
                     @error('doctor_limit')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Price</label>
                     <input value="{{ old('price', $package->price) }}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                     @error('price')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  
                  <div class="form-group">
								<label>Modules</label>
								<div>
                        @if(count($modules) > 0)
                        <div class="m-checkbox-list">
                        @foreach($modules as $module)
																	<label class="m-checkbox m-checkbox--state-success">
																		<input type="checkbox" value="{{$module->id}}" name="module[]" {{count($package->modules()->where('module_id', $module->id)->get()) > 0 ? "checked" : ""}}>
																		{{$module->name}}
																		<span></span>
																	</label>
                                                   @endforeach
																</div>
                                                @else
                                                <p>No Modules Found</a>
                                                @endif
								</div>

                  <div class="form-group row">
								<label class="col-2 col-form-label">Online Presence</label>
								<div class="col-10">
									<span class="kt-switch kt-switch--sm">
									<label>
									<input type="checkbox" {{$package->online_presence === 1 ? "checked" : "" }} name="online_presence" value="1">
									<span></span>
									</label>
									</span>
								</div>
							</div>

                     
                                                
							</div>
               </div>
               <div class="kt-portlet__foot kt-portlet__foot--solid">
                  <div class="kt-form__actions">
                     <div class="row">
                        <div class="col-12">
                           <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Save Package</button>
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