@extends('layouts.frontend.layout')
@section('content')
	<main>
		<div id="hero_register">
			<div class="container margin_120_95">			
				<div class="row">
					<div class="col-lg-6">
						<h1>It's time to find you!</h1>
						<p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.</p>
						<div class="box_feat_2">
							<i class="pe-7s-map-2"></i>
							<h3>Let patients to Find you!</h3>
							<p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-date"></i>
							<h3>Easly manage Bookings</h3>
							<p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-phone"></i>
							<h3>Instantly via Mobile</h3>
							<p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
						</div>
					</div>
					<!-- /col -->
					<div class="col-lg-5 ml-auto">
						<div class="box_form">
							<form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
                                            <input placeholder="Full Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
                                            <input placeholder="Mobile Phone" id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile" autofocus>
                                        </div>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="col-md-6">
										<div class="form-group">
                                            <input placeholder="Office Phone" id="office_phone" type="text" class="form-control @error('office_phone') is-invalid @enderror" name="office_phone" value="{{ old('office_phone') }}" autocomplete="office_phone" autofocus>
                                        </div>
                                        @error('office_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
								</div>
								<!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" autocomplete="email">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
                                </div>
                                <!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
                                            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
                                </div>
                                <!-- /row -->
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
                                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
										</div>
									</div>
                                </div>
                                <input type="hidden" class="form-control" name="userrole" value="hospital">
								<!-- /row -->
								<p class="text-center add_top_10"><input type="submit" class="btn_1" value="Apply For Account"></p>
								<div class="text-center"><small>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</small></div>
							</form>
						</div>
						<!-- /box_form -->
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /hero_register -->
	</main>
	<!-- /main -->
@endsection