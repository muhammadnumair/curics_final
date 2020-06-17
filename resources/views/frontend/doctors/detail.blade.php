@extends('layouts.frontend.layout')
@section('content')
<main>
   <div id="breadcrumb">
      
   </div>
   <!-- /breadcrumb -->
   <div class="container margin_60">
      <div class="row">
         <div class="col-xl-8 col-lg-8">
            <nav id="secondary_nav">
               <div class="container">
                  <ul class="clearfix">
                     <li><a href="#section_1" class="active">General info</a></li>
                     <li><a href="#section_2">Reviews</a></li>
                     <li><a href="#sidebar">Booking</a></li>
                  </ul>
               </div>
            </nav>
            <div id="section_1">
               <div class="box_general_3">
                  <div class="profile">
                     <div class="row">
                        <div class="col-lg-5 col-md-4">
                           <figure>
                              <img src="{{$doctor->user != null && $doctor->user->profile_picture != null ? '/storage/'.$doctor->user->profile_picture : '/storage/nouser.png'}}" alt="" class="img-fluid">
                           </figure>
                        </div>
                        <div class="col-lg-7 col-md-8">
                           <small style="margin-top: 10px; font-size: 14px;">
                           @if(count($doctor->specializations) > 0)
                              @foreach($doctor->specializations as $specialization)
                                 <a href="/doctors/{{strtolower(Session::get('city'))}}/{{$specialization->specialization->alias}}">
                                 <span class="badge badge-pill badge-secondary" style="padding: 8px; background: #E5E7E9; font-weight: 600; color: #34495E; font-size: 12px; border-radius: 5px; border: 1px solid #D7DBDD">
                                    {{$specialization->specialization->name_english}}
                                 </span>
                                 </a>
                              @endforeach
                           @else
                           Not Specified
                           @endif
                           </small>
                           <h1 class="mt-2">{{$doctor->name != null ? $doctor->name : ""}}</h1>
                           <h6>
                              @if($doctor->qualification != null)
                              @foreach($doctor->qualification as $q)
                              {{$q->degree}},
                              @endforeach
                              @else
                              Qualification Not Specified
                              @endif
                           </h6>
                           <h6 class="mt-3">{{$doctor->experience_years != null ? $doctor->experience_years : "0"}} Years Experience</h6>
                           <span class="rating">
                           @for ($i = 1; $i <= 5; $i++)
                           <i class="icon_star
                              @if(count($doctor->reviews) > 0)
                              {{$doctor->reviews->sum('stars')/count($doctor->reviews) >= $i ? 'voted' : ''}}
                              @endif
                           "></i>
                           @endfor
                           <small>
                           ({{count($doctor->reviews)}})
                           </small>
                           <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                           </span>
                           <ul class="contacts">
                              <li>
                                 <h6>Address</h6>
                                 {{$doctor->doctor_address}} -
                                 <a target="_blank" href="https://www.google.com/maps/search/{{$doctor->doctor_address_latitude}},+{{$doctor->doctor_address_longitude}}/@ {{$doctor->doctor_address_latitude}},{{$doctor->doctor_address_longitude}},18z" target="_blank"> <strong>View on map</strong></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <!-- /profile -->
                  <!-- /wrapper indent -->
                  <div class="indent_title_in">
                     <i class="pe-7s-map-marker"></i>
                     <h3>Practice Details</h3>
                  </div>
                  @if(count($doctor->clinics()->where('clinic_active','=', 1)->get()) != 0)
                  @foreach($doctor->clinics()->where('clinic_active','=', 1)->get() as $clinic)
                  <div class="wrapper_indent">
                     <div class="row">
                        <div class="col-lg-6">
                           <ul style="margin-bottom: 0px;">
                              <li><strong><i class=" icon-user-md"></i><a href="#"> {{$clinic->clinic->name}}</a></strong></li>
                              <li><strong><i class="icon-location"></i> {{$clinic->clinic->address}}</strong></li>
                              <li><strong><i class=" icon-money"></i> Fee:</strong> Rs. {{$clinic->doctor_fee}}</li>
                           </ul>
                        </div>
                        <div class="col-lg-6">
                        
                           @if(count($clinic->schedule()->where('doctor_id', $doctor->id)->get()) > 0)
                           <ul style="margin-bottom: 0px;">
                              @foreach($clinic->schedule()->where('doctor_id', $doctor->id)->get() as $s)
                              @if($s->date == null)
                              <li>
                                 <strong>
                                    <div style="display: inline-block; max-width: 50%; min-width: 50%;"><i class="icon-calendar"></i> <span {{$s->open == 0 ? 'style=color:red': ''}}>{{$s->day}}</span>
                                 </strong>
                                 </div><span {{$s->open == 0 ? 'style=color:red;text-decoration:line-through': ''}}>{{date("g:i a", strtotime($s->start_time))}} - {{date("g:i a", strtotime($s->end_time))}} </span>
                              </li>
                              @elseif($s->date != null)
                              <li>
                                 <strong>
                                    <div style="display: inline-block; max-width: 50%; min-width: 50%;"><i class="icon-calendar"></i> {{$s->date}}
                                 </strong>
                                 </div>{{date("g:i a", strtotime($s->start_time))}} - {{date("g:i a", strtotime($s->end_time))}} 
                              </li>
                              @endif
                              @endforeach
                           </ul>
                           @else
                           <p>No Schedule Specified</p>
                           @endif
                        </div>
                     </div>
                  </div>
                  <hr>
                  @endforeach
                  @else
                  <div class="wrapper_indent">
                     <div class="row">
                        <div class="col-lg-6">
                           <p><b>No Clinic Specified</b></p>
                        </div>
                     </div>
                  </div>
                  @endif
                  <!--  End wrapper indent -->
                  <div class="indent_title_in">
                     <i class="pe-7s-user"></i>
                     <h3>Professional statement</h3>
                  </div>
                  <div class="wrapper_indent">
                     <p>
                        {{$doctor->about}}
                     </p>
                     @if(count($doctor->services) != 0)
                     <h6>Services</h6>
                     <div class="row">
                        @foreach($doctor->services as $s)
                        <div class="col-lg-6">
                           <ul class="bullets">
                              <li><a href="#">{{$s->service->name}}</a></li>
                           </ul>
                        </div>
                        @endforeach
                     </div>
                     @endif
                     <!-- /row-->
                  </div>
                  <!-- /wrapper indent -->
                  <hr>
                  <div class="indent_title_in">
                     <i class="pe-7s-news-paper"></i>
                     <h3>Education</h3>
                  </div>
                  <div class="wrapper_indent">
                     <ul class="list_edu">
                        @if(count($doctor->qualification) != 0)
                        @foreach($doctor->qualification as $q)
                        <li><strong>{{$q->institute}}</strong> - {{$q->degree}}</li>
                        @endforeach
                        @else
                        <p>Qualification Not Specified</p>
                        @endif
                     </ul>
                  </div>
                  <!--  End wrapper indent -->
                  <!-- /wrapper indent -->
                  <hr>
                  <div class="indent_title_in">
                     <i class="pe-7s-id"></i>
                     <h3>Experience</h3>
                  </div>
                  <div class="wrapper_indent">
                     <ul class="list_edu">
                        @if(count($doctor->experience) != 0)
                        @foreach($doctor->experience as $e)
                        <li><strong>{{$e->institute}}</strong> - {{$e->field}}</li>
                        @endforeach
                        @else
                        <p>Experience Not Specified</p>
                        @endif
                     </ul>
                  </div>
                  <!--  End wrapper indent -->
                  <!-- /wrapper indent -->
                  <hr>
                  <div class="indent_title_in">
                     <i class="pe-7s-cup"></i>
                     <h3>Achievements and Affiliations</h3>
                  </div>
                  <div class="wrapper_indent">
                     <ul class="list_edu">
                        @if(count($doctor->achievements) != 0)
                        @foreach($doctor->achievements as $achievement)
                        <li><strong>{{$achievement->description}}</strong></li>
                        @endforeach
                        @else
                        <p>Acheivements Not Speicified</p>
                        @endif
                     </ul>
                  </div>
                  <!--  End wrapper indent -->
               </div>
               <!-- /section_1 -->
            </div>
            <!-- /box_general -->
            <div id="section_2">
               <div class="box_general_3">
                  @if(count($doctor->reviews) != 0)
                  <div class="reviews-container">
                     @if(count($doctor->reviews) != 0)
                     <div class="row">
                        <div class="col-lg-3">
                           <div id="review_summary">
                              <strong>{{number_format($doctor->reviews->sum('stars')/count($doctor->reviews), 1)}}</strong>
                              <br>
                              <div class="rating">
                                 @for ($i = 1; $i <= 5; $i++)
                                 <i class="icon_star {{$doctor->reviews->sum('stars')/count($doctor->reviews) >= $i ? 'voted' : ''}}"></i>
                                 @endfor
                              </div>
                              <br>
                              <small>Based on {{count($doctor->reviews)}} reviews</small>
                           </div>
                        </div>
                        <div class="col-lg-9">
                           <div class="row">
                              <div class="col-lg-10 col-9">
                                 <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{(count($doctor->reviews->where('stars', 5))/count($doctor->reviews))*100}}%" aria-valuenow="{{(count($doctor->reviews->where('stars', 5))/count($doctor->reviews))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                           </div>
                           <!-- /row -->
                           <div class="row">
                              <div class="col-lg-10 col-9">
                                 <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{(count($doctor->reviews->where('stars', 4))/count($doctor->reviews))*100}}%" aria-valuenow="{{(count($doctor->reviews->where('stars', 4))/count($doctor->reviews))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                           </div>
                           <!-- /row -->
                           <div class="row">
                              <div class="col-lg-10 col-9">
                                 <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{(count($doctor->reviews->where('stars', 3))/count($doctor->reviews))*100}}%" aria-valuenow="{{(count($doctor->reviews->where('stars', 3))/count($doctor->reviews))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                           </div>
                           <!-- /row -->
                           <div class="row">
                              <div class="col-lg-10 col-9">
                                 <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{(count($doctor->reviews->where('stars', 2))/count($doctor->reviews))*100}}%" aria-valuenow="{{(count($doctor->reviews->where('stars', 2))/count($doctor->reviews))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                           </div>
                           <!-- /row -->
                           <div class="row">
                              <div class="col-lg-10 col-9">
                                 <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{(count($doctor->reviews->where('stars', 1))/count($doctor->reviews))*100}}%" aria-valuenow="{{(count($doctor->reviews->where('stars', 3))/count($doctor->reviews))*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                           </div>
                           <!-- /row -->
                        </div>
                     </div>
                     @endif
                     <!-- /row -->
                     <hr>
                     @if(count($doctor->reviews) != 0)
                     @foreach($doctor->reviews as $review)
                     <div class="review-box clearfix">
                        <figure class="rev-thumb"><img src="{{$review->patient->user != null && $review->patient->user->profile_picture != null ? $review->patient->user->profile_picture : '/storage/patient.png'}}" alt="">
                        </figure>
                        <div class="rev-content">
                           <div class="rating">
                           @for ($i = 1; $i <= 5; $i++)
                           <i class="icon_star
                              @if(count($doctor->reviews) > 0)
                              {{$doctor->reviews->sum('stars')/count($doctor->reviews) >= $i ? 'voted' : ''}}
                              @endif
                           "></i>
                        @endfor
                           </div>
                           <div class="rev-info">
                              {{$review->patient->name}} – {{date('D M, Y', strtotime($review->created_at))}}:
                           </div>
                           <div class="rev-text">
                              <p>
                                 {{$review->review}}
                              </p>
                           </div>
                        </div>
                     </div>
                     <!-- End review-box -->
                     @endforeach
                     @else
                     <p>No Review Posted</p>
                     @endif
                  </div>
                  @else
                  <p>No Review Posted Yet</p>
                  @endif
                  <!-- End review-container -->
                  <hr>
                  <div class="text-right">
                     @if(session('patient'))
                     @if(session('patient')->appointments()->where('doctor_id', $doctor->id)->first() != null)
                     <a href="/doctor/{{$doctor->alias}}/submit-review" class="btn_1">Submit review</a>
                     @else
                     <p>You are not allowed to post review, Please book an appointment first!</p>
                     @endif
                     @else
                     <p>Please <a href="">Login</a> First To Submit Review</p>
                     @endif
                  </div>
               </div>
            </div>
            <!-- /section_2 -->
         </div>
         <!-- /col -->
         <aside class="col-xl-4 col-lg-4" id="sidebar">
            <div class="box_general_3 booking">
               @if(count($doctor->clinics()->where('clinic_active','=', 1)->get()) != 0)
               <form>
                  <div class="title">
                     <h3>Book a Visit</h3>
                     <hr>
                     <h6 style="color: #FFC107">{{$doctor->designation}}</h6>
                     <small><strong>Available On</strong> - 
                    
                     @foreach($doctor->clinics()->where('clinic_active','=', 1)->get()[0]->schedule()->where('doctor_id', $doctor->id)->get() as $s)
                     <span {{$s->open == 0 ? 'style=text-decoration:line-through': ''}}>{{$s->day}}</span>
                     @if (!$loop->last)
                        ,
                     @endif
                     @endforeach
                     </small>
                  </div>
                  <!-- /row -->
                  <h6>Select Clinic</h6>
                  <select onchange="selectClinic(this);" name="clinic" id="select_clinic" class="selectbox">
                     @foreach($doctor->clinics()->where('clinic_active','=', 1)->get() as $clinic)
                     <option value="{{$clinic->clinic->alias}}">{{$clinic->clinic->name}}</option>
                     @endforeach
                  </select>
                  <hr>
                  <a id="book_btn" href="#" class="btn_1 full-width">Book Now</a>
               </form>
               @else
               <p style="margin-bottom: 0px;">You Cannot Make An Appointment To This Doctor</p>
               @endif
            </div>
            <!-- /box_general -->
         </aside>
         <!-- /asdide -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</main>
<!-- /main -->
@endsection