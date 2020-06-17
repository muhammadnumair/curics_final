@extends('layouts.backend.layout')
@section('content')
<style>
   body {
   -webkit-print-color-adjust: exact !important;
   }
</style>
<!--begin::Page Custom Styles(used by this page) -->
<link href="/assets/backend/invoice-2.css" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles -->
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
         <div class="kt-portlet">
            @if($appointment->Prescription != null)
            <div class="kt-portlet__body kt-portlet__body--fit">
               <div class="kt-invoice-2">
                  <div class="kt-invoice__head">
                     <div class="kt-invoice__container">
                        <div class="kt-invoice__brand">
                           <div>
                              <p class="kt-invoice__title" style="font-size: 1.3rem; margin-bottom: 0px;">{{$appointment->doctor->name}}</p>
                              <p style="font-size: 1rem; margin-bottom: 0px;" class="kt-invoice__desc">
                                 @foreach($appointment->doctor->qualification as $q)
                                 {{$q->degree}},
                                 @endforeach
                              </p>
                              <p style="margin-bottom: 0px" class="kt-invoice__desc"><b>{{$appointment->doctor->experience_years != null ? $appointment->doctor->experience_years : "0"}} Years Experience</b></p>
                              <p style="margin-bottom: 0px" class="kt-invoice__desc"><b>{{count($appointment->doctor->reviews)}} Positive Reviews</b></p>
                           </div>
                           <div href="#" class="kt-invoice__logo">
                              <a href="#"><img style=" width: 150px; " src="/assets/backend/media/logo-dark.png"></a>
                              <span class="kt-invoice__desc" style="padding-top: 0px;">
                              <span>{{$appointment->clinic->address}}</span>
                              </span>
                           </div>
                        </div>
                        <div class="kt-invoice__items">
                           <div class="kt-invoice__item">
                              <span class="kt-invoice__subtitle">Patient Name</span>
                              <span class="kt-invoice__text">{{$appointment->patient_name}}</span>
                           </div>
                           <div class="kt-invoice__item">
                              <span class="kt-invoice__subtitle">Date</span>
                              <span class="kt-invoice__text">{{date('d/m/Y', strtotime($appointment->created_at))}} {{date('h:i a', strtotime($appointment->time_slot))}}</span>
                           </div>
                           <div class="kt-invoice__item">
                              <span class="kt-invoice__subtitle">Appointment No.</span>
                              <span class="kt-invoice__text">#{{$appointment->id}}</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="kt-invoice__body">
                     <div class="kt-invoice__container">
                        <div class="table-responsive">
                           <table class="table table-bordered table-hover">
                              <thead class="thead-dark">
                                 <tr>
                                    <th><b>Medicine</b></th>
                                    <th><b>Instruction</b></th>
                                    <th><b>Days</b></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($appointment->Prescription->medicines as $medicine)
                                 <tr>
                                    <td>{{$medicine->medicine->medicine_name}}</td>
                                    <td>{{$medicine->medicine_instruction}}</td>
                                    <td class="kt-font-danger">{{$medicine->medicine_days}}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="kt-invoice__body">
                     <div class="kt-invoice__container">
                        <div class="table-responsive">
                           <table class="table table-bordered table-hover">
                              <thead class="thead-dark">
                                 <tr>
                                    <th><b>Test Name</b></th>
                                    <th><b>Instruction</b></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($appointment->Prescription->tests as $test)
                                 <tr>
                                    <td>{{$test->test->test_name}}</td>
                                    <td>{{$test->test_instruction}}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="kt-invoice__footer">
                     <div class="kt-invoice__container">
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>Weight</th>
                                    <th>Blood Pressure</th>
                                    <th>Diabetes</th>
                                    <th>Height</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>{{$appointment->prescription->weight}} Kg</td>
                                    <td>{{$appointment->prescription->blood_pressure}} mm Hg</td>
                                    <td>{{$appointment->prescription->diabetes}} mg/dL</td>
                                    <td>{{$appointment->prescription->height}} Feet</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="kt-invoice__actions">
                     <div class="kt-invoice__container">
                        <a href="/account/prescription/create/{{$appointment->id}}" class="btn btn-label-success btn-bold">Generate Prescription</a>
                        <button type="button" class="btn btn-brand btn-bold" onclick="window.print();">Print Invoice</button>
                     </div>
                  </div>
               </div>
            </div>
            @else
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5">
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="text-align:center">
                    <p style="font-weight: 700;">No Prescription Found</p>
                    <p>Please Generate Your First Prescription By Clicking The Button Below</p>
                    <a class="btn btn-bold btn-label-success btn-sm" href="/account/prescription/create/{{$appointment->id}}">Generate Prescription</a>
                </div>
            </div>
            @endif
         </div>
      </div>
      <!-- end:: Content -->
      <!-- end:: Content -->
   </div>
   @endsection