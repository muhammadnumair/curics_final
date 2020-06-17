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
            <div class="panel panel-default panel-table">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col col-xs-6">
                     </div>
                     <div class="col col-xs-6 text-right">
                        <a href="/doctors/{{strtolower(Session::get('city'))}}" class="btn btn-sm btn-primary btn-create mb-4">Make new Appointment</a>
                     </div>
                  </div>
               </div>
               <div class="panel-body">
                  <table class="table table-striped table-bordered table-list">
                     <thead>
                        <tr>
                           <th><em class="icon-cog"></em></th>
                           <th>Appointment Date</th>
                           <th>Time Slot</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($appointments as $appointment)
                        <tr>
                           <td align="center">
                           <form onsubmit="return confirm('Do you really want to delete?');" action="{{ url('/patient/dashboard/appointments', ['id' => $appointment->id]) }}" style="display: inline;" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm"><em style="color: white;" class="icon-trash-empty"></em></button>
                                        @method('delete') @csrf
                                    </form>
                              
                           </td>
                           <td>{{date('d F Y', strtotime($appointment->appointment_date))}}<span class="badge badge-success ml-4">{{date('l', strtotime($appointment->appointment_date))}}</span><span class="badge badge-danger ml-4">{{$appointment->status}}</span></td>
                           <td>{{date('h:i A', strtotime($appointment->time_slot))}}</td>
                           <td>
                              <a href="/patient/dashboard/appointment/invoice/{{$appointment->invoice->id}}" class="btn btn-warning btn-sm" style="color:white;"> Invoice</a>
                              <a href="/patient/dashboard/appointment/prescription/{{$appointment->id}}" class="btn btn-info btn-sm" style="color:white;">Prescription</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="panel-footer">
                  <div class="row">
                     <div class="col col-xs-12 d-flex flex-row-reverse">
                        {{$appointments->links() }}
                     </div>
                  </div>
               </div>
            </div>
            <!-- @end #job1 -->
         </div>
      </div>
   </div>
   <!-- /container -->
</main>
@endsection