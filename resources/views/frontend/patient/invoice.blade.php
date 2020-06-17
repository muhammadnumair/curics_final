@extends('layouts.frontend.layout')
@section('content')
<style>
   /** jobs display **/
   #jobs {
   display: block;
   margin-bottom: 80px;
   }
   #job-info {
   display: block;
   float: left;
   width: 70%;
   min-height: 300px;
   border-left: 1px solid #ddd;
   padding: 0 20px;
   /* min-width: 700px; */
   }
   .jobitem {
   display: none;
   }
   .jobitem.displayed {
   display: block;
   }
   #jobs-list {
   display: block;
   width: 30%;
   float: left;
   /* min-width: 300px; */
   }
   #jobs-list ul { }
   #jobs-list ul li { 
   font-size: 14px;
   font-weight: 500;
   border-bottom: 1px solid #ddd;
   }
   #jobs-list ul li a {
   display: block;
   width: 100%;
   padding: 15px 7px;
   text-decoration: none;
   font-weight: 500;
   color: #9a9a9a;
   background: #fff;
   }
   #jobs-list ul li a:hover {
   color: #787878;
   }
   #jobs-list ul li a.active {
   display: block;
   color: #414141;
   padding-left: 6px;
   position: relative;
   left: 1px;
   font-size: 14px;
   font-weight: 500;
   }
   .panel-table .panel-body{
   padding:0;
   }
   .panel-table .panel-body .table-bordered{
   border-style: none;
   margin:0;
   }
   .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
   text-align:center;
   width: 100px;
   }
   .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
   .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
   border-right: 0px;
   }
   .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
   .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
   border-left: 0px;
   }
   .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
   border-bottom: 0px;
   }
   .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
   border-top: 0px;
   }
   .panel-table .panel-footer .pagination{
   margin:0; 
   }
   /*
   used to vertically center elements, may need modification if you're not using default sizes.
   */
   .panel-table .panel-footer .col{
   line-height: 34px;
   height: 34px;
   }
   .panel-table .panel-heading .col h3{
   line-height: 30px;
   height: 30px;
   }
   .panel-table .panel-body .table-bordered > tbody > tr > td{
   line-height: 34px;
   }
   .panel-footer{
   background: #CCD1D1;
   padding: 10px;
   border-radius: 0px 0px 10px 10px;
   }
   thead{
   background: #CCD1D1;
   }
</style>
<main>
   <div id="breadcrumb">
      
   </div>
   <!-- /breadcrumb -->
   <div class="bg_color_1">
   <div class="container pt-5 pb-5">
   <div class="row">
   <div id="content" style="width: 100% !important;">
   <div class="wrapper">
      <div id="jobs" class="clearfix row">
         <div id="jobs-list">
            <ul>
               <li><a href="/patient/dashboard"><i class="icon-bookmark"></i> Dashboard</a></li>
               <li><a href="/patient/dashboard/appointments" class="active"><i class="icon-cart"></i> Appointments</a></li>
               <li><a href="/patient/dashboard/reviews"><i class="icon-star"></i> Reviews</a></li>
               <li><a href="/patient/dashboard/settings"><i class="icon-cog-6"></i> Settings</a></li>
               <li><a href="/patient/dashboard/logout"><i class="icon-logout"></i> Logout</a></li>
            </ul>
         </div>
         <div id="job-info">
         <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img style=" width: 130px; " src="/assets/backend/media/logo-dark.png">
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">{{$invoice->appointment->doctor->name}}</p>
                            <p style="font-weight-bold mb-1">
                                 @foreach($invoice->appointment->doctor->qualification as $q)
                                 {{$q->degree}},
                                 @endforeach
                            </p>
                            <p class="font-weight-bold mb-1">Invoice #550</p>
                            <p class="text-muted">Due to: {{date('d M, Y', strtotime($invoice->appointment->created_at))}}</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Clinic Info</p>
                            <p class="mb-1">{{$invoice->appointment->clinic->name}}</p>
                            <p>{{$invoice->appointment->clinic->address}}</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Appointment Info</p>
                            <p class="mb-1">{{date('d M, Y', strtotime($invoice->appointment->created_at))}} {{date('h:i a', strtotime($invoice->appointment->time_slot))}}</p>
                            <p class="mb-1">#{{$invoice->appointment->id}}</p>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light text-right">Rs. {{$invoice->appointment->payable_amount}}</div>
                        </div>
                        <div class="py-3 px-5 text-right">
                           
                        </div>

                        <div class="py-3 px-5 text-right">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         </div>
      </div>
   </div>
   <!-- /container -->
</main>
@endsection