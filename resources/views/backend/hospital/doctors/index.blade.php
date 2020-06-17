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
                     Doctors List
                  </h3>
               </div>
               <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                     <div class="kt-portlet__head-actions">
                        &nbsp;
                        <a href="/account/hospital/doctor/create" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        New Doctor
                        </a>
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
                        <th title="Field #2">Department</th>
                        <th title="Field #4">Email</th>
                        <th title="Field #4">Phone#</th>
                        <th title="Field #4">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                     $i = 1;
                     @endphp
                     @foreach(Auth::user()->clinic->doctors()->orderBy('created_at', 'DESC')->get() as $d)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$d->doctor != null ? $d->doctor->name : "NILL"}}</td>
                            @if($d->doctor->department->where('clinic_id', Auth::user()->clinic->id)->first()->department != null)
                            <td><span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">{{$d->doctor->department->where('clinic_id', Auth::user()->clinic->id)->first() != null ? $d->doctor->department->where('clinic_id', Auth::user()->clinic->id)->first()->department->department_name : 'Not Enrolled'}}</span></td>
                            @else
                            <td><span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">No Department Specified</span></td>
                            @endif
                            <td>{{$d->doctor->user->email}}</td>
                            <td>{{$d->doctor->user->mobile}}</td>
                            <td>
                                <span style="display: inline;">
                                <a href="/doctor/{{$d->doctor->alias}}" target="_blank" class="btn btn-primary btn-sm">Profile</a>
                                <a href="/account/hospital/appointments/{{$d->doctor->id}}" class="btn btn-primary btn-sm">Appointments</a>
                                <a href="/account/hospital/doctor/schedule/{{$d->doctor->id}}" class="btn btn-primary btn-sm">Schedule</a>
                                    <!-- <a href="/account/achievement/edit/{{$d->id}}" class="btn btn-success btn-sm">Edit</a> -->
                                    <form onsubmit="return confirm('Do you really want to delete?');" action="{{ url('/account/hospital/doctor/delete', ['id' => $d->id]) }}" style="display: inline;" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @method('delete') @csrf
                                    </form>
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