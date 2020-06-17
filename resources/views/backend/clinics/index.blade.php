@extends('layouts.backend.layout')
@section('content')
<!-- begin::Body -->
<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading"  >

   <!-- begin:: Page -->
   <!-- begin:: Header Mobile -->
   <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
      <div class="kt-header-mobile__logo">
         <a href="index.html">
         <img alt="Logo" src="/assets/backend/media/logo.png" style="width: 135px;"/>
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
      <div class="kt-container  kt-container--fluid ">
         <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">All Clinics</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <a href="/account/clinic/create" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10 text-right">
            Add New Clinic
            </a>
         </div>
</div>
      </div>
      
      <!-- end:: Content Head -->
      <!-- begin:: Content -->
      <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="kt_content">
         <!--Begin::Dashboard 1-->
         <!--Begin::Section-->
         <div class="row">
            <div class="col-xl-4">
               <!--Begin::Section-->
               <div class="row">
                  <div class="col-xl-8">
                     <div class="">
                        <!--begin:: Widgets/New Users-->
                        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                           <div class="kt-portlet__body">
                              <div class="tab-content">
                                 <div class="tab-pane active" id="kt_widget4_tab1_content">
                                    <div class="kt-widget4">
                                       @foreach($clinics as $clinic)
                                       <div class="kt-widget4__item">
                                          <div class="kt-widget4__info">
                                             <a href="#" class="kt-widget4__username">
                                                {{$clinic->clinic->name}}
                                             </a>
                                             <p class="kt-widget4__text">
                                                {{$clinic->clinic->description}}
                                             </p>
                                          </div>
                                          <a href="/account/chooseclinic/{{$clinic->id}}"
                                          class="btn btn-sm btn-label-brand btn-bold">Choose Clinic</a>
                                          <a href=""
                                          class="btn btn-primary btn-sm ml-2">Edit</a>
                                          <a href=""
                                          class="btn btn-danger btn-sm ml-2">Delete</a>
                                       </div>
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--end:: Widgets/New Users-->
                     </div>
                  </div>
               </div>
               <!--End::Section-->
            </div>
         </div>
      </div>
      <!-- end:: Content -->
      <!-- end:: Content -->
   </div>
   @endsection