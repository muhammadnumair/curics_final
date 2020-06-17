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
                     Add New Medicine
                  </h3>
               </div>
            </div>
            <form class="kt-form kt-form--label-right" action="/account/hospital/medicine/create" method="post">
               @csrf
                <div class="kt-portlet__body">
                  <div class="form-group">
                     <label>Name</label>
                     <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name">
                     @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group" id="companies">
                        <label>Category</label><br>
                        <select class="form-control m-select2" id="kt_select2_4" name="medicine_category_id" style="width: 100%;">
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                     <label>Purchase Price</label>
                     <input class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price') }}" type="text" name="purchase_price">
                     @error('purchase_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Sale Price</label>
                     <input class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price') }}" type="text" name="sale_price">
                     @error('sale_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Store Box</label>
                     <input class="form-control @error('store_box') is-invalid @enderror" value="{{ old('store_box') }}" type="text" name="store_box">
                     @error('store_box')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Quantity</label>
                     <input class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" type="text" name="quantity">
                     @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Generic Name</label>
                     <input class="form-control @error('generic_name') is-invalid @enderror" value="{{ old('generic_name') }}" type="text" name="generic_name">
                     @error('generic_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Company</label>
                     <input class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" type="text" name="company">
                     @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Effects</label>
                     <input class="form-control @error('effects') is-invalid @enderror" value="{{ old('effects') }}" type="text" name="effects">
                     @error('effects')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                     <label>Expiry Date</label>
                     <input type="text" class="form-control" id="kt_datepicker_1" readonly placeholder="Select Expiry Date" name="expiry_date"/>
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