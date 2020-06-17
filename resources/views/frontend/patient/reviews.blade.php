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
      <div class="container">
         <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Category</a></li>
            <li>Page active</li>
         </ul>
      </div>
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
               <li><a href="/patient/dashboard/appointments"><i class="icon-cart"></i> Appointments</a></li>
               <li><a href="/patient/dashboard/reviews" class="active"><i class="icon-star"></i> Reviews</a></li>
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
                        <a href="/doctors/{{strtolower(Session::get('city'))}}" class="btn btn-sm btn-primary btn-create mb-4">Make new Review</a>
                     </div>
                  </div>
               </div>
               <div class="panel-body">
                  <table class="table table-striped table-bordered table-list">
                     <thead>
                        <tr>
                           <th><em class="icon-cog"></em></th>
                           <th>Review</th>
                           <th>Stars</th>
                           <th>Added At</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($reviews as $review)
                        <tr>
                           <td align="center" style="display: flex; justify-content: space-between;">
                              <a class="btn btn-danger btn-sm"><em style="color: white;" class="icon-trash-empty"></em></a>
                              <a href="/doctor/{{$review->doctor->alias}}" class="btn btn-success btn-sm"><em style="color: white;" class="icon-vcard"></em></a>
                           </td>
                           <td>{{$review->review}}</td>
                           <td>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="icon_star {{ $review->stars >= $i  ?  'voted' : '' }}"></i>
                                @endfor
                            </div>
                           </td>
                           <td>
                            {{date('d F Y', strtotime($review->created_at))}}
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="panel-footer">
                  <div class="row">
                     <div class="col col-xs-12 d-flex flex-row-reverse">
                        {{$reviews->links() }}
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