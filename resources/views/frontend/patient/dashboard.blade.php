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

    .dbox {
        position: relative;
        background: rgb(255, 86, 65);
        background: -moz-linear-gradient(top, rgba(255, 86, 65, 1) 0%, rgba(253, 50, 97, 1) 100%);
        background: -webkit-linear-gradient(top, rgba(255, 86, 65, 1) 0%, rgba(253, 50, 97, 1) 100%);
        background: linear-gradient(to bottom, rgba(255, 86, 65, 1) 0%, rgba(253, 50, 97, 1) 100%);
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#ff5641', endColorstr='#fd3261', GradientType=0);
        border-radius: 4px;
        text-align: center;
        margin: 60px 0 50px;
    }
    .dbox__icon {
        position: absolute;
        transform: translateY(-50%) translateX(-50%);
        left: 50%;
    }
    .dbox__icon:before {
        width: 75px;
        height: 75px;
        position: absolute;
        background: #fda299;
        background: rgba(253, 162, 153, 0.34);
        content: '';
        border-radius: 50%;
        left: -17px;
        top: -17px;
        z-index: -2;
    }
    .dbox__icon:after {
        width: 60px;
        height: 60px;
        position: absolute;
        background: #f79489;
        background: rgba(247, 148, 137, 0.91);
        content: '';
        border-radius: 50%;
        left: -10px;
        top: -10px;
        z-index: -1;
    }
    .dbox__icon > i {
        background: #ff5444;
        border-radius: 50%;
        line-height: 40px;
        color: #FFF;
        width: 40px;
        height: 40px;
        font-size: 28px;
    }
    .dbox__body {
        padding: 50px 20px;
    }
    .dbox__count {
        display: block;
        font-size: 30px;
        color: #FFF;
        font-weight: 300;
    }
    .dbox__title {
        font-size: 13px;
        color: #FFF;
        color: rgba(255, 255, 255, 0.81);
    }
    .dbox__action {
        transform: translateY(-50%) translateX(-50%);
        position: absolute;
        left: 50%;
    }
    .dbox__action__btn {
        border: none;
        background: #FFF;
        border-radius: 19px;
        padding: 7px 16px;
        text-transform: uppercase;
        font-weight: 500;
        font-size: 11px;
        letter-spacing: .5px;
        color: #003e85;
        box-shadow: 0 3px 5px #d4d4d4;
    }


    .dbox--color-2 {
        background: rgb(252, 190, 27);
        background: -moz-linear-gradient(top, rgba(252, 190, 27, 1) 1%, rgba(248, 86, 72, 1) 99%);
        background: -webkit-linear-gradient(top, rgba(252, 190, 27, 1) 1%, rgba(248, 86, 72, 1) 99%);
        background: linear-gradient(to bottom, rgba(252, 190, 27, 1) 1%, rgba(248, 86, 72, 1) 99%);
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#fcbe1b', endColorstr='#f85648', GradientType=0);
    }
    .dbox--color-2 .dbox__icon:after {
        background: #fee036;
        background: rgba(254, 224, 54, 0.81);
    }
    .dbox--color-2 .dbox__icon:before {
        background: #fee036;
        background: rgba(254, 224, 54, 0.64);
    }
    .dbox--color-2 .dbox__icon > i {
        background: #fb9f28;
    }

    .dbox--color-3 {
        background: rgb(183,71,247);
        background: -moz-linear-gradient(top, rgba(183,71,247,1) 0%, rgba(108,83,220,1) 100%);
        background: -webkit-linear-gradient(top, rgba(183,71,247,1) 0%,rgba(108,83,220,1) 100%);
        background: linear-gradient(to bottom, rgba(183,71,247,1) 0%,rgba(108,83,220,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b747f7', endColorstr='#6c53dc',GradientType=0 );
    }
    .dbox--color-3 .dbox__icon:after {
        background: #b446f5;
        background: rgba(180, 70, 245, 0.76);
    }
    .dbox--color-3 .dbox__icon:before {
        background: #e284ff;
        background: rgba(226, 132, 255, 0.66);
    }
    .dbox--color-3 .dbox__icon > i {
        background: #8150e4;
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
               <li><a href="/patient/dashboard" class="active"><i class="icon-bookmark"></i> Dashboard</a></li>
               <li><a href="/patient/dashboard/appointments"><i class="icon-cart"></i> Appointments</a></li>
               <li><a href="/patient/dashboard/reviews"><i class="icon-star"></i> Reviews</a></li>
               <li><a href="/patient/dashboard/settings"><i class="icon-cog-6"></i> Settings</a></li>
               <li><a href="/patient/dashboard/logout"><i class="icon-logout"></i> Logout</a></li>
            </ul>
         </div>
         <div id="job-info">
            <div id="job1" class="jobitem displayed">
            <div class="row">
                <div class="col-md-4">
                    <div class="dbox dbox--color-1">
                        <div class="dbox__icon">
                            <i class="icon-stethoscope"></i>
                        </div>
                        <div class="dbox__body">
                            <span class="dbox__count">{{count(Session::get('patient')->appointments) < 10 ? '0' : ''}}{{count(Session::get('patient')->appointments)}}</span>
                            <span class="dbox__title">Appointments</span>
                        </div>
                        
                        <div class="dbox__action">
                            <a href="/patient/dashboard/appointments" class="dbox__action__btn">More Info</a>
                        </div>				
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dbox dbox--color-2">
                        <div class="dbox__icon">
                            <i class=" icon-star"></i>
                        </div>
                        <div class="dbox__body">
                            <span class="dbox__count">{{count(Session::get('patient')->reviews) < 10 ? '0' : ''}}{{count(Session::get('patient')->reviews)}}</span>
                            <span class="dbox__title">Reviews</span>
                        </div>
                        
                        <div class="dbox__action">
                            <a href="/patient/dashboard/reviews" class="dbox__action__btn">More Info</a>
                        </div>				
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dbox dbox--color-3">
                        <div class="dbox__icon">
                            <i class="icon-chart-bar"></i>
                        </div>
                        <div class="dbox__body">
                            <span class="dbox__count">2502</span>
                            <span class="dbox__title">Points</span>
                        </div>
                        
                        <div class="dbox__action">
                            <a href="" class="dbox__action__btn">More Info</a>
                        </div>				
                    </div>
                </div>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Patient Weight: {{Session::get('patient')->weight}} Kg</h5>
                        <small>Last Updated On {{date('d M Y', strtotime(Session::get('patient')->updated_at))}}</small>
                    </div>
                    <p class="mb-1">Our system will automatically update your weight depending on the latest activity.</small>
                </a>
            </div>
            <div class="list-group mt-2">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Blood Pressure: {{Session::get('patient')->blood_pressure}} Kg</h5>
                        <small>Last Updated On {{date('d M Y', strtotime(Session::get('patient')->updated_at))}}</small>
                    </div>
                    <p class="mb-1">Our system will automatically update your blood pressure depending on the latest activity.</small>
                </a>
            </div>
            <div class="list-group mt-2">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Diabetes: {{Session::get('patient')->diabetes}} Kg</h5>
                        <small>Last Updated On {{date('d M Y', strtotime(Session::get('patient')->updated_at))}}</small>
                    </div>
                    <p class="mb-1">Our system will automatically update your diabetes depending on the latest activity.</small>
                </a>
            </div>
            </div>
            <!-- @end #job1 -->
         </div>
      </div>
   </div>
   <!-- /container -->
</main>
@endsection