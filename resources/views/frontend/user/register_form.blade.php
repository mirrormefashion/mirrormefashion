<div id="bodyPosition"></div>

<div class="container-fluid">
	<div class="row ">
		<div class="col-lg-12">
			<h1 class="text-center">Mirror Me Fashion</h1>
			<p class="text-center">Complete the missing fields to create your new account</p>			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-5" id="demo_data">
			<div class="form-group" id="fname-wrap">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
				@error('name')
					<div class="mt-2 text-sm text-red-500">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="form-group" id="email-wrap">
				<label for="email">Email address</label>
				<input id="email" type="email" class="form-control" name="email"  autocomplete="email" value="{{ old('email') }}" >
				<small style="color:red; font-size:1rem"></small>
				@error('email')
					<div class="mt-2 text-sm text-red-500">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="form-group" id="password-wrap">
				<label for="pwd">Password</label>
				<input id="password" type="password" class="form-control" name="password"  autocomplete="current-password">
				<small style="color:red; font-size:1rem"></small>
				@error('password')
					<div class="mt-2 text-sm text-red-500">
						{{ $message }}
					</div>
				@enderror 
			</div>
			<div class="form-group" id="confirm-wrap">
				<label for="pwd">Password Confirmation</label>
				<input id="passwordConfirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="current-password">
				<small style="color:red; font-size:1rem"></small>
			</div>
			<!--====Classify data start=====-->
			<input type="hidden" id="classification" name="shape" value="" >
			<input type="hidden" id="variant" name="variant" value="" >
			<!--====Classify data end =====-->
		</div>
		<div class="col-lg-5" id="body_stats">
			<div class="bodystats-wrapper">
				<!------ body stats data ------>
				<div class="flex justify-content-between" id="form-data-left">
					<div class="form-group" id="bust-wrap">
						<label for="bust">Bust</label>
						<input type="text" class="form-control" id="bust" name="bust" value="0">
					</div>
					<div class="form-group" id="shoe-wrap">
						<label for="shoe">Shoe Size</label>
						<input type="text" class="form-control" id="shoe" name="shoe_size" value="0">
					</div>

					<div class="form-group" id="weight-wrap">
						<label for="weight">Weight</label>
						<input type="text" class="form-control" id="weight" name="weight" value="0">
					</div>

					<div class="form-group" id="height-wrap">
						<label for="height">Height</label>
						<input type="text" class="form-control" id="height" name="height" value="0">
					</div>
				</div>
				<div class="flex justify-content-between" id="form-data-right">
					<div class="form-group" id="mass-wrap">
							<label for="body_mass">BMI</label>
							<input type="text" class="form-control" id="mass" name="bmi" value="0">
						</div>
						<div class="form-group" id="age-wrap">
							<label for="age">Age</label>
							<input type="text" class="form-control" id="age" name="age" value="">
						</div>
					<label class="block text-lg" for="gender">Gender</label>
					<div class="mb-3 form-check form-check-inline" id="gender">
						<input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
						<label class="mr-2 form-check-label" for="female">
							Female
						</label>

						<input class="form-check-input" type="radio" name="gender" id="male" value="male">
						<label class="mr-2 form-check-label" for="male">
							Male
						</label>

						<input class="form-check-input" type="radio" name="gender" id="non-binary" value="male">
						<label class="mr-2 form-check-label" for="on-binary">
							Non-Binary
						</label>
					</div>        
				</div>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			<div class="" id="complete">
				<p id="policy-blurb"><input class="mr-2" type="checkbox" required  name="" id="">By signing up to Mirror Me Fashion you agree to our <a href="{{ url('/terms') }}">Terms</a>, <a href="{{ url('/privacy') }}">Conditions</a> and <a href="{{ url('/terms/#cookies-policy') }}">Cookies Policy</a>.</p>
				<button for="regform" type="submit"  class="btn btn-default" name="submit">Join</button>
			</div><!--- sign up two ---->		
		</div>
	</div>
	<div class="row" id="home-foot">
		<div class="col-lg-4 col-md-4 col-sm-4"></div>
		<div class="col-lg-4 col-md-4 col-sm-4">
			<small class="text-white">
				<span><a href="/alpha">Mirror Me Fashion LLC</a> © 2022 - 2023  |  All Rights Reserved</a></span><br>
				<span><a href="/virtual-fashion-stylist">The Virtual Fashion Stylist AI Technology</a>  |  </span>
				<span><a href="/cookies">Cookies Policy</a> | <a href="/privacy">Privacy Policy</a></span>
			</small>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4"></div>
	</div>
</div>
