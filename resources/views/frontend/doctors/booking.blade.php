@extends('layouts.frontend.layout')
@section('content')
<main style="transform: none; position: relative; ">
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
   <div class="container margin_60" style="transform: none;">
      <div class="row" style="transform: none;">
         <aside class="col-xl-3 col-lg-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1576px;">
            <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: absolute; transform: translateY(881px); width: 255px; top: 0px;">
               <div class="box_profile">
                  <figure style="padding: 10px;">
                     <img src="{{$doctor->user != null && $doctor->user->profile_picture != null ? '/storage/'.$doctor->user->profile_picture : '/storage/nouser.png'}}" alt="" class="img-fluid" style=" border-radius: 5px; ">
                  </figure>
                  
                  <h1>{{$doctor->name}}</h1>
                  <span class="rating">
                  @if(count($doctor->reviews) > 0)
                  @for ($i = 1; $i <= 5; $i++)
                     <i class="icon_star {{$doctor->reviews->sum('stars')/count($doctor->reviews) >= $i ? 'voted' : ''}}"></i>
                  @endfor
                  @else
                  <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                  @endif
                  <small>({{count($doctor->reviews)}})</small>
                  <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                  </span>
                  <ul class="contacts">
                     <li>
                        <h6>Address</h6>
                        {{$clinic->clinic->address}}
                     </li>
                     <li>
                        <h6>Phone</h6>
                        <a href="tel://000434323342">+00043 4323342</a>
                     </li>
                  </ul>
                  <div class="text-center"><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" class="btn_1 outline" target="_blank"><i class="icon_pin"></i> View on map</a></div>
               </div>
               <div class="resize-sensor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                  <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                     <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 295px; height: 1585px;"></div>
                  </div>
                  <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                     <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                  </div>
               </div>
               <div class="resize-sensor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                  <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                     <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 265px; height: 705px;"></div>
                  </div>
                  <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                     <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                  </div>
               </div>
            </div>
         </aside>
         <!-- /asdide -->
         <div class="col-xl-9 col-lg-8">
            <div class="tabs_styled_2">
               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book">{{$clinic->clinic->name}}</a>
                  </li>
               </ul>
               <!--/nav-tabs -->
               <div class="tab-content">
                  <div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">
                     <form action="/booking_confirm" method="post">
                        @csrf
                        <div class="main_title_3">
                           <h3><strong>1</strong>Select your date</h3>
                        </div>
                        <div class="form-group add_bottom_45">
                           <style>
                              .date_select li{
                              display: inline;
                              }
                           </style>
                           <ul class="time_select date_select">
                              @php
                              $start_date = date('Y-m-d');
                              @endphp
                              @for($i = 1; $i <= 15; $i++)
                              <li>
                                 <input {{ $i === 1 ? "selected" : '' }} type="radio" id="date{{$i}}" name="date" value="{{$start_date}}"/>
                                 <label for="date{{$i}}">
                                 <span>{{date('l', strtotime($start_date))}}</span><br>
                                 <span>{{date('M d', strtotime($start_date))}}</span>
                                 </label>
                              </li>
                              @php
                              $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
                              @endphp
                              @endfor
                           </ul>
                           <ul class="legend">
                              <li><strong></strong>Available</li>
                              <li><strong></strong>Not available</li>
                           </ul>
                        </div>
                        <div class="main_title_3">
                           <h3><strong>2</strong>Select your time</h3>
                        </div>
                        <div class="row justify-content-center add_bottom_45">
                           <div class="col-md-12 col-12 text-center">
                              <ul class="time_select" id="time_slots">
                                 
                              </ul>
                           </div>
                        </div>
                        <input type="hidden" name="doctor_id" value="{{$doctor->id}}"/>
                        <input type="hidden" name="clinic_id" value="{{$clinic->clinic->id}}"/>
                        
                        <!-- /row -->
                        <div class="main_title_3">
                           <h3><strong>3</strong>Your Details</h3>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <label>Patient Name</label>
                                 <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="e.g Muhammad Ahmed" value="{{Session::get('patient') != null && Session::get('patient')->name ? Session::get('patient')->name : ''}}">
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <label>Phone Number</label>
                                 <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="e.g +92-3322653380" value="{{Session::get('patient') != null && Session::get('patient')->phone_number ? Session::get('patient')->phone_number : ''}}">
                              </div>
                           </div>
                        </div>
                        <div class="message">
                           <p>Exisitng Patient? <a href="#0">Click here to login</a></p>
                           <p style="margin-top: 7px;">This will store your appointment in your account for future use</p>
                        </div>
                        <hr>
                        <p class="text-center">
                           <input type="submit" class="btn_1 medium" value="Book Now"/>
                        </p>
                     </form>
                  </div>
                  <!-- /tab_3 -->
               </div>
               <!-- /tab-content -->
            </div>
            <!-- /tabs_styled -->
         </div>
         <!-- /col -->
      </div>
      <!-- /row -->
   </div>
   <!-- /col -->
</main>
@endsection