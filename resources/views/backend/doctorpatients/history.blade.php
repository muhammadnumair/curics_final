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
                     {{$patient->name}} History
                  </h3>
               </div>
               <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                     <div class="kt-portlet__head-actions">
                        &nbsp;
                        @if(Auth::user()->userrole != "hospital")
                        <a href="/account/patient/create" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                           New Patient
                        </a>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            <div class="kt-portlet__body">
               <!--begin: Datatable -->
               <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1">
                            <i class="la la-exclamation-triangle"></i> Appointments
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2">
                            <i class="la la-cloud-download"></i> Prescriptions
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                    <table id="table_id" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                        <thead>
                           <tr>
                              <th title="Field #1">#</th>
                              <th title="Field #2">Patient Name</th>
                              <th title="Field #2">Phone Number</th>
                              <th title="Field #2">Appointment</th>
                              <th title="Field #4">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                           $i = 1;
                           @endphp
                           @foreach($appointments as $q)
                           <tr>
                              <td>#{{$q->id != null ? $q->id : "NILL"}} </td>
                              <td>{{$q->patient_name != null ? $q->patient_name : "NILL"}} <span style="width: 113px;"><span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">{{$q->status != null ? $q->status : "NILL"}}</span></span></td>
                              <td>{{$q->patient_number != null ? $q->patient_number : "NILL"}}</td>
                              <td>{{$q->appointment_date != null ? $q->appointment_date : "NILL"}} <span style="width: 113px;"><span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill">{{$q->time_slot != null ? date("g:i a", strtotime($q->time_slot)) : "NILL"}}</span></span></td>
                              <td>
                                 <span style="display: inline;">
                                    <a href="/account/appointment/invoice/{{$q->invoice->id}}" class="btn btn-bold btn-label-warning btn-sm">Invoice</a>
                                    <a href="/account/prescription/{{$q->id}}" class="btn btn-bold btn-label-success btn-sm">Prescription</a>
                                    @if(date("m/d/Y") <= $q->appointment_date)
                                    <a href="/account/appointment/settings/{{$q->id}}" class="btn btn-bold btn-label-brand btn-sm" >Settings</a>
                                    @endif
                                    
                                    <form onsubmit="return confirm('Do you really want to delete?');" action="{{ url('/account/appointment', ['id' => $q->id]) }}" style="display: inline;" method="post">
                                       <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                       @method('delete') @csrf
                                    </form>
                                 </span>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                    </div>
                    <div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
                    
                    </div>
                </div>
               
               <!--end: Datatable -->
            </div>
         </div>
      </div>
   </div>
   @endsection