@extends('layouts.backend.layout')
@section('content')
<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">   <!-- begin:: Page -->
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
   <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5">
      <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
         <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
               <div class="kt-portlet__head-label">
                  <span class="kt-portlet__head-icon">
                  <i class="kt-font-brand fa fa-id-badge"></i>
                  </span>
                  <h3 class="kt-portlet__head-title">
                     Patient Payments
                  </h3>
               </div>
               <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                     <div class="kt-portlet__head-actions">
                        
                     </div>
                  </div>
               </div>
            </div>
            <div class="kt-portlet__body">
               <!--begin: Datatable -->
               <table id="table_id" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                  <thead>
                     <tr>
                        <th title="Field #1">#</th>
                        <th title="Field #2">Name</th>
                        <th title="Field #5">Gender</th>
                        <th title="Field #7">Phone#</th>
                        <th title="Field #7">Amount Paid</th>
                        <th title="Field #7">Due Balance</th>
                        <th title="Field #7">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                     $i = 1;
                     @endphp
                     @foreach($patients as $patient)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$patient->patient->name != null ? $patient->patient->name : "NILL"}}</td>
                            <td>{{$patient->patient->gender != null ? $patient->patient->gender : "NILL"}}</td>
                            <td>{{$patient->patient->phonenum != null ? $patient->patient->phonenum : "NILL"}}</td>
                            <td>
                              @if(Auth::user()->userrole == "hospital")
                                 {{$patient->patient->payments()->where('clinic_id', Auth::user()->clinic->id)->sum('paid_amount')}}
                              @else
                                 {{$patient->patient->payments()->where(['clinic_id' => Session('clinic')->clinic->id, 'doctor_id' => Session('doctor')->id])->sum('paid_amount')}}
                              @endif           
                            </td>
                            <td>
                              @if(Auth::user()->userrole == "hospital")
                                 {{$patient->patient->invoices()->where(['clinic_id' => Auth::user()->clinic->id, 'invoice_status' => 'Unpaid'])->sum('invoice_amount')}}
                              @else
                                 {{$patient->patient->invoices()->where(['clinic_id' => Session('clinic')->clinic->id, 'doctor_id' => Session('doctor')->id, 'invoice_status' => 'Unpaid'])->sum('invoice_amount')}}
                              @endif    
                            </td>
                            <td>
                                 <span style="display: inline;">
                                    <a href="/account/patient/payment/history/{{$patient->patient->id}}" class="btn btn-primary btn-sm">Payment History</a>
                                 </span>
                            </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
               <!--end: Datatable -->
            </div>
         </div>
      </div>
   </div>
   @endsection