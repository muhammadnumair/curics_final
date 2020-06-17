@extends('layouts.frontend.layout')
@section('content')
<main>
		<div id="breadcrumb">
			
		</div>
		<!-- /breadcrumb -->

		<div class="container margin_60_35">
			<div class="row justify-content-center">
				<div class="col-lg-8">
				@if(session('patient'))
				<form method="POST" action="/doctor/{{$doctor->alias}}/submit-review">
					@csrf
					<div class="box_general_3 write_review">
						<h1>Write a review for  {{$doctor->name}}</h1>
						<div class="rating_submit">
							<div class="form-group">
							<label class="d-block">Overall rating</label>
							<span class="rating">
								<input type="radio" class="rating-input" id="5_star" name="stars" value="5"><label for="5_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="4_star" name="stars" value="4"><label for="4_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="3_star" name="stars" value="3"><label for="3_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="2_star" name="stars" value="2"><label for="2_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="1_star" name="stars" value="1"><label for="1_star" class="rating-star"></label>
							</span>
							</div>
						</div>
						<!-- /rating_submit -->
						<div class="form-group">
							<label>Title of your review</label>
							<input class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" type="text" placeholder="If you could say it in one sentence, what would you say?" name="title">
							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
                        	@enderror 
						</div>
						<div class="form-group">
							<label>Your review</label>
							<textarea class="form-control @error('review') is-invalid @enderror" style="height: 180px;" placeholder="Write your review here ..." name="review">{{ old('review') }}</textarea>
							@error('review')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
                        	@enderror 
						</div>
						<hr>
						<div class="form-group">
							<div class="checkboxes add_bottom_30 add_top_15">
								<label class="container_check">I accept <a href="#0">terms and conditions and general policy</a>
									<input type="checkbox" name="accept">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<input type="submit" value="Submit review" class="btn_1"/>
					</div>
				</form>
				@else
				<p>Please <a href="">Login</a> First To Submit Review</p>
				@endif
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	@endsection