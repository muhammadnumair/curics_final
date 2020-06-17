@extends('layouts.backend.layout')
@section('content')
<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">
   <!-- begin:: Page -->
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
         <div class="row">
            <div class="col-lg-4">
               <div class="kt-portlet kt-iconbox kt-iconbox--wave">
                  <div class="kt-portlet__body">
                     <div class="kt-iconbox__body">
                        <div class="kt-iconbox__icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <rect x="0" y="0" width="24" height="24"></rect>
                                 <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
                                 <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
                              </g>
                           </svg>
                        </div>
                        <div class="kt-iconbox__desc">
                           <h3 class="kt-iconbox__title">
                              <a class="kt-link" href="#">{{$sub_total}}</a>
                           </h3>
                           <div class="kt-iconbox__content">
                              Total Amount
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="kt-portlet kt-iconbox kt-iconbox--wave">
                  <div class="kt-portlet__body">
                     <div class="kt-iconbox__body">
                        <div class="kt-iconbox__icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <rect x="0" y="0" width="24" height="24"></rect>
                                 <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"></path>
                                 <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"></path>
                                 <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"></path>
                              </g>
                           </svg>
                        </div>
                        <div class="kt-iconbox__desc">
                           <h3 class="kt-iconbox__title">
                              <a class="kt-link" href="#">{{$discount}}</a>
                           </h3>
                           <div class="kt-iconbox__content">
                              Discount Amount
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="kt-portlet kt-iconbox kt-iconbox--animate">
                  <div class="kt-portlet__body">
                     <div class="kt-iconbox__body">
                        <div class="kt-iconbox__icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                 <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                 <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </g>
                           </svg>
                        </div>
                        <div class="kt-iconbox__desc">
                           <h3 class="kt-iconbox__title">
                              <a class="kt-link" href="#">{{$gross_amount}}</a>
                           </h3>
                           <div class="kt-iconbox__content">
                              Gross Amount
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="kt-portlet kt-iconbox kt-iconbox--animate">
                  <div class="kt-portlet__body">
                     <div class="kt-iconbox__body">
                        <div class="kt-iconbox__icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                 <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                 <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </g>
                           </svg>
                        </div>
                        <div class="kt-iconbox__desc">
                           <h3 class="kt-iconbox__title">
                              <a class="kt-link" href="#">{{$deposited_amount}}</a>
                           </h3>
                           <div class="kt-iconbox__content">
                              Desposited Amount
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="kt-portlet kt-iconbox kt-iconbox--animate">
                  <div class="kt-portlet__body">
                     <div class="kt-iconbox__body">
                        <div class="kt-iconbox__icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                 <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                 <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </g>
                           </svg>
                        </div>
                        <div class="kt-iconbox__desc">
                           <h3 class="kt-iconbox__title">
                              <a class="kt-link" href="#">{{$expenses}}</a>
                           </h3>
                           <div class="kt-iconbox__content">
                              Total Expenses
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="kt-portlet kt-iconbox kt-iconbox--animate">
                  <div class="kt-portlet__body">
                     <div class="kt-iconbox__body">
                        <div class="kt-iconbox__icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                 <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                 <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </g>
                           </svg>
                        </div>
                        <div class="kt-iconbox__desc">
                           <h3 class="kt-iconbox__title">
                              <a class="kt-link" href="#">{{$total_commission_earned}}</a>
                           </h3>
                           <div class="kt-iconbox__content">
                              Comission Earned
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <form method="get">
            <div class="row">
               <div class="col-7">
                  <div class="form-group row">
                     <label class="col-form-label col-lg-2 col-sm-12"> Filter by Date</label>
                     <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="input-daterange input-group" id="kt_datepicker_4_3">
                           <input type="text" class="form-control" name="from" autocomplete="off" value="{{isset(request()->from) ? request()->from : ''}}">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                           </div>
                           <input autocomplete="off" type="text" class="form-control" name="to" value="{{isset(request()->to) ? request()->to : ''}}">
                        </div>
                        <span class="form-text text-muted">Use this option for range selection</span>
                     </div>
                  </div>
               </div>
               <div class="col-3">
                  <button type="submit" class="btn btn-brand">Filter</button>
               </div>
            </div>
         </form>
         <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
               <div class="kt-portlet__head-label">
                  <span class="kt-portlet__head-icon">
                  <i class="kt-font-brand fa fa-id-badge"></i>
                  </span>
                  <h3 class="kt-portlet__head-title">
                     Income
                  </h3>
               </div>
               <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                     <div class="kt-portlet__head-actions">
                        &nbsp;
                     </div>
                  </div>
               </div>
            </div>
            <div class="kt-portlet__body">
            <div class="table-responsive">
                           <table class="table table table-hover">
                              <thead class="thead-light">
                                 <tr>
                                    <th><b>Category</b></th>
                                    <th><b>Amount</b></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Sub Total</td>
                                    <td>{{$total_earnings == null ? $total_earnings : $total_earnings}}</td>
                                 </tr>
                                 <tr>
                                    <td>Total Discount</td>
                                    <td>{{$total_discount == null ? $discount : $total_discount}}</td>
                                 </tr>
                                 <tr>
                                    <td>Gross Income</td>
                                    <td>{{$gross_income == null ? $gross_amount : $gross_income}}</td>
                                 </tr>
                                 <tr>
                                    <td>Total Hospital Amount</td>
                                    <td>{{$total_hospital_amount == null ? $sub_total : $total_hospital_amount}}</td>
                                 </tr>
                                 <tr>
                                    <td>Total Doctor Comission Earned</td>
                                    <td>{{$clinic_commision == null ? $clinic_commision : $clinic_commision}}</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
            </div>
         </div>
         <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
               <div class="kt-portlet__head-label">
                  <span class="kt-portlet__head-icon">
                  <i class="kt-font-brand fa fa-id-badge"></i>
                  </span>
                  <h3 class="kt-portlet__head-title">
                     Expenses
                  </h3>
               </div>
               <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                     <div class="kt-portlet__head-actions">
                        &nbsp;
                     </div>
                  </div>
               </div>
            </div>
            <div class="kt-portlet__body">
            <div class="table-responsive">
                           <table class="table table table-hover">
                              <thead class="thead-light">
                                 <tr>
                                    <th><b>Category</b></th>
                                    <th><b>Amount</b></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($exp_categroies as $category)
                                 <tr>
                                    <td>{{$category->category}}</td>
                                    @if(isset($_GET['from']))
                                    <td>{{$category->expenses->whereBetween('created_at', [$_GET['from'], $_GET['to']])->sum('amount')}}</td>
                                    @else
                                    <td>{{$category->expenses->sum('amount')}}</td>
                                    @endif
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
            </div>
         </div>
      </div>
   </div>
   @endsection