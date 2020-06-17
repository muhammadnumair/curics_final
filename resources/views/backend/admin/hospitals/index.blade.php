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
                     All Hospitals
                  </h3>
               </div>
               <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                     <div class="kt-portlet__head-actions">
                        &nbsp;
                        <a href="/admin/hospital/create" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                           Create New Hospital
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
                        <th title="Field #2">Title</th>
                        <th title="Field #4">Email</th>
                        <th title="Field #4">Address</th>
                        <th title="Field #4">Phone</th>
                        <th title="Field #4">Package</th>
                        <th title="Field #4">Status</th>
                        <th title="Field #4">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                     $i = 1;
                     @endphp
                     @foreach($hospitals as $hospital)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$hospital->name != null ? $hospital->name : "NILL"}}</td>
                            <td>{{$hospital->email != null ? $hospital->email : "NILL"}}</td>
                            <td>{{$hospital->address != null ? $hospital->address : "NILL"}}</td>
                            <td>{{$hospital->phone != null ? $hospital->phone : "NILL"}}</td>
                            <td>{{$hospital->package != null ? $hospital->package->package_name : "NILL"}}</td>
                            <td><span class="kt-badge kt-badge--{{$hospital->status == 0 ? 'danger'  : 'success'}}  kt-badge--inline kt-badge--pill">{{$hospital->status == 0 ? "Disable"  : "Enable"}}</span></td>
                            <td>
                                <span style="display: inline;">
                                 <a href="/admin/hospital/status/{{$hospital->id}}" class="btn btn-{{$hospital->status == 0 ? 'success'  : 'primary'}}  btn-sm">{{$hospital->status == 0 ? "Enable"  : "Disable"}}</a>
                                    <a href="/admin/hospital/edit/{{$hospital->id}}" class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Do you really want to delete?');" action="{{ url('/admin/hospital', ['id' => $hospital->id]) }}" style="display: inline;" method="post">
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