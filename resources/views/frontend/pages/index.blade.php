@extends('layouts.frontend.layout')
@section('content')
<main>
   <div class="hero_home version_2">
      <div class="content">
         <h3>Curics </h3>
         <p>
            Easiest way to find a doctor, reserve your number and save your time!!
         </p>
         <form method="get" action="/doctors/{{session()->get('city') === null ? 'all' : strtolower(session()->get('city'))}}/all">
            <div id="custom-search-input">
               <div class="input-group">
                  <input type="text" class=" search-query" placeholder="Ex. Name, Specialization ...." name="search">
                  <input type="submit" class="" value="Search">
               </div>
               
            </div>
         </form>
         <p style=" font-size: 15px; margin-top: 10px; ">
            Your location is <span style="color: #f9fc3d;" id="user_location">{{Session::get('city') . ", " . Session::get('country')}}</span>
         </p>
      </div>
   </div>
   <!-- /Hero -->
   <div class="container margin_120_95">
			<div class="main_title">
				<h2>Find your doctor or clinic</h2>
				<p>Nec graeci sadipscing disputationi ne, mea ea nonumes percipitur. Nonumy ponderum oporteat cu mel, pro movet cetero at.</p>
			</div>
			<div class="row justify-content-center">
				
				<div class="col-xl-4 col-lg-4 col-md-4">
					<div class="list_home">
						<div class="list_title">
							<i class="icon_archive_alt"></i>
							<h3>Search by Specialities</h3>
						</div>
						<ul>
                  @foreach($specialization as $a)
							<li><a href="/doctors/{{session()->get('city') === null ? 'all' : strtolower(session()->get('city'))}}/{{$a->alias}}"><strong>{{count($a->doctors_specilizations)}}</strong>{{$a->name_english}} </a></li>
                  @endforeach
							<li><a href="/all-specializations">More....</a></li>
						</ul>
					</div>
				</div>
            <div class="col-xl-4 col-lg-4 col-md-4">
					<div class="list_home">
						<div class="list_title">
							<i class="icon_archive_alt"></i>
							<h3>Search by City</h3>
						</div>
						<ul>
                  @foreach($cities as $city)
							<li><a href="/doctors/{{$city->alias}}/all"><strong>{{count($city->doctors)}}</strong>{{$city->name}}</a></li>
                  @endforeach
							<li><a href="/all-cities">More....</a></li>
						</ul>
					</div>
				</div>
            <div class="col-xl-4 col-lg-4 col-md-4">
					<div class="list_home">
						<div class="list_title">
							<i class="icon_archive_alt"></i>
							<h3>Search by disease</h3>
						</div>
						<ul>
                  @foreach($diseases as $disease)
							<li><a href="list.html"><strong>{{count($disease->doctors_diseases)}}</strong>{{$disease->name_english}} </a></li>
                  @endforeach
							<li><a href="/all-diseases">More....</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
   <!-- /container -->
   <div class="cta_subscribe">
      <div class="container-fluid h-100">
         <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 p-0">
               <div class="block_1" style="background: #18AFD3">
                  <figure><img src="http://www.ansonika.com/findoctor/img/doctors_icon.svg" alt=""></figure>
                  <!--<h3 style="line-height: 30px; font-weight: bold; letter-spacing: 2px; text-transform: inherit; font-size: 33px; margin-bottom: 20px;" >Are you a Doctor?</h3>-->
                  <p style="line-height: 30px; margin-bottom: 5px;">The service allows you to get maximum visibility online and to manage appointments and contacts coming from the site, in a simple and fast way.</p>
                  <a href="register.php" class="btn_1">Register as Doctor</a>
               </div>
            </div>
            <div class="col-md-6 p-0">
               <div class="block_2" style="padding: 60px; background-color: #31879b;">
                  <figure><img src="http://www.ansonika.com/findoctor/img/patient_icon.svg" alt=""></figure>
                  <p style="line-height: 30px;  margin-bottom: 5px;">Choosing a specialist has never been so fast! You can filter search results by location and medical specialization, and book medical examination online.</p>
                  <a href="register.php" class="btn_1">Register as Patient</a>
               </div>
            </div>
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
   </div>
   <!-- /container -->
   <div class="container margin_120_95">
      <div class="main_title">
         <h2>Discover the <strong>online</strong> appointment!</h2>
         <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
      </div>
      <div class="row add_bottom_30">
         <div class="col-lg-4">
            <div class="box_feat" id="icon_1">
               <span></span>
               <h3>Find a Doctor</h3>
               <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="box_feat" id="icon_2">
               <span></span>
               <h3>View profile</h3>
               <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="box_feat" id="icon_3">
               <h3>Book a visit</h3>
               <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
            </div>
         </div>
      </div>
      <!-- /row -->
      <p class="text-center"><a href="/doctors/{{strtolower(Session::get('city'))}}" class="btn_1 medium">Find Doctor</a></p>
   </div>
   <div id="app_section">
      <div class="container">
         <div class="row justify-content-around">
            <div class="col-md-5">
               <p><img src="{{asset('storage/general_settings/app_img.svg')}}" alt="" class="img-fluid" width="500" height="433"></p>
            </div>
            <div class="col-md-6">
               <small>Application</small>
               <h3>Download <strong>Curics App</strong> Now!</h3>
               <p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
               <div class="app_buttons wow" data-wow-offset="100">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
                     <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
                     <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
                     <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
                  </svg>
                  <a href="#0" class="fadeIn"><img src="{{asset('storage/general_settings/apple_app.png')}}" alt="" width="150" height="50" data-retina="true"></a>
                  <a href="#0" class="fadeIn"><img src="{{asset('storage/general_settings/google_play_app.png')}}" alt="" width="150" height="50" data-retina="true"></a>
               </div>
            </div>
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
   </div>
   <!-- /app_section -->
</main>
<!-- /main content -->
@endsection