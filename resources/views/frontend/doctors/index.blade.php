@extends('layouts.frontend.layout')
@section('content')
<style>
.sbOptions li:last-child {
    padding-left: 7px;
}
.sbSelector:hover, .sbSelector:link, .sbSelector:visited {
   text-transform: capitalize;
}
.filter_selected{
   background: #3f4079 !important;
   color: white !important;
}
</style>
<?php
   $filter_city = "all";
   if(Request::segment(2) != null){
      $filter_city = Request::segment(2);
   }
   
   $filter_gender = "all";
   if(isset($_GET['gender'])){
      $filter_gender = $_GET['gender'];
   }

   $filter_speciality = "all";
   if(Request::segment(3) != null){
      $filter_speciality = Request::segment(3);
   }

   $segments_count = count(Request::segments());
?>
<main class="theia-exception">
   <div id="results">
      <div class="container">
         <form method="get" action="{{$_SERVER['REQUEST_URI']}}">
         <div class="row">
            <div class="col-md-6">
               <h4><strong>Showing {{$doctors->count() < 10 ? '0' : ''}}{{$doctors->count()}}</strong> of {{$doctors->total() < 10 ? '0' : ''}}{{$doctors->total()}} results</h4>
            </div>
            
            <div class="col-md-6">
               <div class="search_bar_list">
               <form method="get" action="/doctors/{{session()->get('city') === null ? 'all' : strtolower(session()->get('city'))}}/all">
                  <input type="text" class="form-control" placeholder="Ex. Specialist, Name, Doctor..." name="search" value="{{isset($_GET['search']) ? $_GET['search'] : ''}}">
                  <input type="submit" value="Search">
               </form>
               </div>
            </div>
         </div>
         </form>
         <!-- /row -->
      </div>
      <!-- /container -->
   </div>
   <!-- /results -->
   <div class="filters_listing">
      <div class="container">
         <ul class="clearfix">
            <li class="d-flex flex-row">
               <div>
               <h6>Gender</h6>
               <div class="switch-field">
                  <label for="doctors" style="text-transform: capitalize;" {{$filter_gender == 'all' ? 'class=filter_selected' : ''}} onclick="updateFilters('gender', 'all')">All</label>
                  <label for="doctors" style="text-transform: capitalize;" {{$filter_gender == 'male' ? 'class=filter_selected' : ''}} onclick="updateFilters('gender', 'male')">Male</label>
                  <label for="clinics" style="text-transform: capitalize;" {{$filter_gender == 'female' ? 'class=filter_selected' : ''}} onclick="updateFilters('gender', 'female')">Female</label>
               </div>
               </div>
               <div class="ml-5">
                  <h6>Sort By</h6>
                  <div class="switch-field">
                     <!-- <input type="radio" id="all" name="type_patient" value="all" checked> -->
                     <label for="all" style="text-transform: capitalize; background: #3f4079; color: white;">Best Rated</label>
                     <!-- <input type="radio" id="clinics" name="type_patient" value="clinics"> -->
                     <label for="clinics" style="text-transform: capitalize;">Closest</label>
                  </div>
               </div>
            </li>
            
            <li>
               <h6>Speciality</h6>
               <select name="orderby" class="selectbox" id="speciality" onchange="updateFilters('speciality', '')">
                  <option value="all" {{$filter_speciality === "all" ? "selected" : ""}}>All</option>
                  @foreach($specialaties as $speciality)
                     <option value="{{$speciality->alias}}" {{$filter_speciality === $speciality->alias ? "selected" : ""}}>{{$speciality->name_english}}</option>
                  @endforeach
               </select>
            </li>
            
            <li>
               <h6>City</h6>
               
               <select name="city" class="selectbox" onchange="updateFilters('city', '')" id="city">
                     <option value="all" {{$filter_city === "all" ? "selected" : ""}}>All</option>
                  @foreach($cities as $city)
                     <option value="{{$city->alias}}" {{$filter_city === $city->alias ? "selected" : ""}}>{{$city->name}}</option>
                  @endforeach
               </select>
            </li>
            
         </ul>
      </div>
      <!-- /container -->
   </div>
   <!-- /filters -->
   <div class="container margin_60_35">
      <div class="row">
         <div class="col-lg-12">
            <!-- Doctor Listing -->
            @if(count($doctors) > 0)
            <div class="row">
               @foreach ($doctors as $doctor)
               <div class="col-lg-6">
               <div class="strip_list wow fadeIn">
                  <figure>
                     <a href="/doctor/{{$doctor->alias}}"><img src="{{$doctor->user != null && $doctor->user->profile_picture != null ? '/storage/'.$doctor->user->profile_picture : '/storage/nouser.png'}}" alt=""></a>
                  </figure>
                  
                  @foreach($doctor->specializations as $specialization)
                     <a href="/doctors/{{strtolower(Session::get('city'))}}/{{$specialization->specialization->alias}}">
                     <span class="badge badge-pill badge-secondary" style="padding: 8px; background: #E5E7E9; font-weight: 600; color: #34495E; font-size: 12px; border-radius: 5px; border: 1px solid #D7DBDD">
                        {{$specialization->specialization->name_english}}
                     </span>
                     </a>
                  @endforeach
                  <br >
                  <h3 class="mt-3"><a href="/doctor/{{$doctor->alias}}">{{$doctor->name}}</a></h3>
                  <p>{{Str::words($doctor->about, 30, '...')}}</p>
                  <span class="rating">
                  @for ($i = 1; $i <= 5; $i++)
                     <i class="icon_star
                        @if(count($doctor->reviews) > 0)
                        {{$doctor->reviews->sum('stars')/count($doctor->reviews) >= $i ? 'voted' : ''}}
                        @endif
                     "></i>
                  @endfor
                  </span>
                  <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                  <ul>
                     <li>
                     <a target="_blank" href="https://www.google.com/maps/search/{{$doctor->doctor_address_latitude}},+{{$doctor->doctor_address_longitude}}/@ {{$doctor->doctor_address_latitude}},{{$doctor->doctor_address_longitude}},18z" target="_blank"> <strong>View on map</strong></a>
                     </li>
                     <li><a href="/doctor/{{$doctor->alias}}">View Profile</a></li>
                  </ul>
               </div>
               </div>
               @endforeach
            </div>
            @else
            <div class="alert alert-primary" role="alert">
             No Doctors Found
            </div>
            @endif
            <!-- End Doctor Listing -->
            <!-- Pagination -->
            {{ $doctors->links() }}
            <!-- End Pagination -->
         </div>
         <!-- /col -->
         @if(count($doctors) > 0)
         <!-- <aside class="col-lg-5" id="sidebar">
            <div id="map_listing" class="normal_list">
            </div>
         </aside> -->
         @endif
         <!-- /aside -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</main>
<!-- /main -->
<script>
   function updateFilters(paramName, paramValue)
   {
      var url =  new URL(window.location.href);     
      if(paramName == 'city'){
         var segements_count = "<?php echo $segments_count ?>";
         var current_city = "<?php echo $filter_city ?>";
         window.location.href = url.toString().replace(current_city, document.getElementById("city").value);
      }else if(paramName == 'speciality'){
         var current_speciality = "<?php echo $filter_speciality ?>";
         //alert(current_speciality + ": " + document.getElementById("speciality").value);
         window.location.href = url.toString().replace(current_speciality, document.getElementById("speciality").value);
      }else{ 
         if (url.searchParams.get(paramName)) {
            url.searchParams.set(paramName, paramValue);
            window.location.href = url;
         }else{
            url.searchParams.set(paramName, paramValue);
            window.location.href = url;
         }
      }
   }
</script>
@endsection