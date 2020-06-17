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
         <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
               <div class="kt-portlet__head-label">
                  <span class="kt-portlet__head-icon">
                  <i class="kt-font-brand fa fa-star"></i>
                  </span>
                  <h3 class="kt-portlet__head-title">
                     Pharmacy Sales
                  </h3>
               </div>
               <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                     <div class="kt-portlet__head-actions">
                        &nbsp;
                        <a href="/account/pharmacy/create" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        New Sale
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
                        <th title="Field #2">Date</th>
                        <th title="Field #2">Sub Total</th>
                        <th title="Field #4">Discount</th>
                        <th title="Field #4">Gross Total</th>
                        <th title="Field #4">Options</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                     $i = 1;
                     @endphp
                     @foreach($sales as $sale)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{date('Y-m-d', strtotime($sale->created_at))}}</td>
                            <td>{{$sale->sub_total}}</td>
                            <td>{{$sale->discount}}</td>
                            <td>{{$sale->gross_total}}</td>
                            <td>
                                <span style="display: inline;">
                                    <a href="/account/pharmacy/invoice/{{$sale->id}}" class="btn btn-success btn-sm">Invoice</a>
                                    <form onsubmit="return confirm('Do you really want to delete?');" action="{{ url('/account/pharmacy', ['id' => $sale->id]) }}" style="display: inline;" method="post">
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
   <!-- Modal -->
   <div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Change Appointment Settings</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               <div class="d-flex justify-content-end">
               <a href="/account/appointment/settings/" id="advance_settings" class="btn btn-success btn-sm" style=" text-align: right; float: right; margin-bottom: 8px; ">Advanced Settings</a>
               </div>
               <form class="kt-form kt-form--label-right" action="" method="post" id="appointment_settings">
                  @csrf               
                  <div class="kt-portlet__body">
                     <div class="form-group">
                        <label>Appointment Status</label><br>
                        <select class="form-control m-select2 change_status" id="kt_select2_1" name="status" style="width: 100%;">
                           <option value="Pending">Pending</option>
                           <option value="On-hold">On-hold</option>
                           <option value="Approved">Approved</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Amount Payable</label>
                        <input type="number" class="form-control" name="payable_amount" id="payable_amount"/>
                     </div>
                     <div class="form-group">
                        <label>Amount Paid</label>
                        <input class="form-control" type="number" name="paid_amount" id="paid_amount">
                     </div>
                     <div class="form-group">
                        <label>Cashback Amount</label>
                        <input class="form-control" type="number" name="cashback1" value="0.0" id="cashback1">
                     </div>
                     <div class="form-group">
                        <label>Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight"/>
                     </div>

                     <div class="form-group">
                        <label>Blood Pressure</label>
                        <input type="text" class="form-control" name="blood_pressure" id="blood_pressure"/>
                     </div>

                     <div class="form-group">
                        <label>Diabetes</label>
                        <input type="text" class="form-control" name="diabetes" id="diabetes"/>
                     </div>
                     <input class="form-control" type="hidden" name="cashback" id="cashback">
                  </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Save Changes</button>
            </div>
            </form>
         </div>
      </div>
   </div>
   <script>
      $(document).ready(function(){
         $("#payable_amount").attr('disabled','disabled');
         $("#paid_amount").attr('disabled','disabled');
         $("#cashback1").attr('disabled','disabled');

         $('#kt_modal_6').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $('#advance_settings').get(0).setAttribute('href', '/account/appointment/settings/'+rowid);
            $('#appointment_settings').get(0).setAttribute('action', '/account/appointment/changesettings/'+rowid);
         });

         $('.change_status').on('change', function() {
            if(this.value == "Approved"){
               $("#payable_amount").removeAttr('disabled');
               $("#paid_amount").removeAttr('disabled');
            }else{
               $("#payable_amount").attr('disabled','disabled');
               $("#paid_amount").attr('disabled','disabled');
            }
         });
         
         var payable_amount = 0;
         var paid_amount = 0;
         $("#payable_amount").on("paste keyup", function() {
            payable_amount = $(this).val();
            $('#cashback').val(paid_amount - payable_amount);
            $('#cashback1').val(paid_amount - payable_amount);
         });

         $("#paid_amount").on("paste keyup", function() {
            paid_amount = $(this).val(); 
            $('#cashback').val(paid_amount - payable_amount);
            $('#cashback1').val(paid_amount - payable_amount);
         });
      });
   </script>
   @endsection