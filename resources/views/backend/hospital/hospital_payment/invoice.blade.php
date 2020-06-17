@extends('layouts.backend.layout')
@section('content')
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
            <div class="kt-portlet__body kt-portlet__body--fit">
               <div class="kt-invoice-2">
                  <div class="kt-invoice__head">
                     <div class="kt-invoice__container">
                        <div class="kt-invoice__brand">
                           <div>
                              <p class="kt-invoice__title" style="font-size: 1.3rem; margin-bottom: 0px;">{{$payment->clinic->name}}</p>
                              <span>{{$payment->clinic->address}}</span>
                           </div>
                           <div href="#" class="kt-invoice__logo">
                              <a href="#"><img style=" width: 150px; " src="/assets/backend/media/logo-dark.png"></a>
                              <span class="kt-invoice__desc" style="padding-top: 0px;">
                              </span>
                           </div>
                        </div>
                        <div class="kt-invoice__items">
                           <div class="kt-invoice__item">
                              <span class="kt-invoice__subtitle"><b>Patient Name</b></span>
                              <span class="kt-invoice__text">{{$payment->patient->name}}</span>
                           </div>
                           <div class="kt-invoice__item">
                              <span class="kt-invoice__subtitle"><b>Date</b></span>
                              <span class="kt-invoice__text">{{date('d M Y', strtotime($payment->created_at))}}</span>
                           </div>
                           <div class="kt-invoice__item">
                              <span class="kt-invoice__subtitle"><b>Slip Status.</b></span>
                              <span class="kt-invoice__text">#Paid</span>
                           </div>

                           <div class="table-responsive mt-5">
                              <table class="table table-bordered table-hover">
                                 <thead class="thead-dark">
                                    <tr>
                                       <th><b>Item Name</b></th>
                                       <th><b>Quantity</b></th>
                                       <th><b>Price</b></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($payment->items as $item)
                                    <tr>
                                       <td>{{$item->item->name}}</td>
                                       <td>{{$item->quantity}}</td>
                                       <td>{{$item->item->price }}</td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="kt-invoice__footer">
                     <div class="kt-invoice__container">
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th class="d-flex justify-content-end">Payable Amount</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr class="d-flex justify-content-end">
                                    <td class="kt-font-danger kt-font-xl kt-font-boldest"><span>Rs.</span> {{$payment->gross_total}}</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="kt-invoice__actions">
                     <div class="kt-invoice__container">
                        <a href="/account/finance/payment/create" class="btn btn-label-success btn-bold">Make New Payment</a>
                        <button type="button" class="btn btn-brand btn-bold" onclick="window.print();">Print Invoice</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end:: Content -->
      <!-- end:: Content -->
   </div>
   @endsection