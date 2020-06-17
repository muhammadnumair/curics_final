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
   <div id="" style="width: 100% !important;">
   <div class="">

      <div id="jobs" class="clearfix row">
         <div id="jobs-list">
            <ul>
               <li><a href="/patient/dashboard"><i class="icon-bookmark"></i> Dashboard</a></li>
               <li><a href="/patient/dashboard/appointments"><i class="icon-cart"></i> Appointments</a></li>
               <li><a href="/patient/dashboard/reviews"><i class="icon-star"></i> Reviews</a></li>
               <li><a href="/patient/dashboard/settings"><i class="icon-cog-6"></i> Settings</a></li>
               <li><a href="/patient/dashboard/logout" class="active"><i class="icon-logout"></i> Logout</a></li>
            </ul>
         </div>
         <div id="job-info">
            <div id="job4" class="jobitem displayed">
               <p>
                    Are you sure you want to logout?
               </p>

               <a href="{{URL::to('/')}}/logout" class="btn btn-danger btn-sm"><span>Logout</span></a>
            </div>
            <!-- @end #job1 -->
         </div>
      </div>
   </div>
   <!-- /container -->
</main>
@endsection