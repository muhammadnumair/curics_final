@extends('layouts.frontend.layout')
@section('content')
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

		<div class="">
			<div class="container pt-5 pb-5">
                <div class="list_home">
						<div class="list_title">
							<i class="icon_archive_alt"></i>
							<h3>Find Doctors By Disease</h3>
						</div>
						<ul class="mt-4">
                            <div class="row">
                                @foreach($diseases as $disease)
                                <div class="col-4">
                                <li><a href="list.html"><strong>{{count($disease->doctors_diseases)}}</strong>{{$disease->name_english}} </a></li>
                                </div>
                                @endforeach
                            </div>
						</ul>
					</div>
            </div>
        </div>
		<!-- /container -->
	</main>
	@endsection