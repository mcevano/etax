@extends('layouts.app')

@section('content')
	<section class="container-main">
		<div class="flex-container">
			<div class="flex-item">
				<div class="content-holder bg-white">
					<figure>
						<img class="mx-auto d-block" src="{{ asset('images/logo.png') }}" alt="eTax Logo" width="70">
					</figure>
					<h4 class="font-orange text-center">Create Account Information</h4>
					<div class="alert alert-success">Your account has been successfully confirmed. Please fill up the details below for you to successfully login to your account.</div>
					
					 <form method="POST" action="/account/{{ Auth::user()->id }}" class="needs-validation">
					 	@method('PATCH')
					 	@csrf
						 <div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="inputFirstName"><span class="font-red"><strong>*</strong></span> First Name:</label>
						      <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" id="inputFirstName" name="first_name">
						      <div class="invalid-feedback">
						        {{ $errors->first('first_name') }}
						      </div>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="inputFirstName"><span class="font-red"><strong>*</strong></span> Last Name:</label>
						      <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" id="inputLastName" name="last_name">
						      <div class="invalid-feedback">
						        {{ $errors->first('last_name') }}
						      </div>
						    </div>
						    
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="inputEmail"><span class="font-red"><strong>*</strong></span> Email Address:</label>
						      <input type="text" class="form-control" id="inputEmail" name="email" value="{{ Auth::user()->email }}" disabled >
						    </div>
						    <div class="form-group col-md-6">
						      <label for="inputContact">Contact Number(Optional)</label>
						      <input type="text" class="form-control" id="inputContact" name="contact">
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="username"><span class="font-red"><strong>*</strong></span> Username:</label>
						      <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username">
						      <div class="invalid-feedback">
						        {{ $errors->first('username') }}
						      </div>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="inputPassword"><span class="font-red"><strong>*</strong></span> Password:</label>
						      <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="inputPassword" name="password">
						      <div class="invalid-feedback">
						        {{ $errors->first('password') }}
						      </div>
						    </div>
						</div>
				        <button type="submit" class="btn btn-primary mx-auto d-block">Update Account</button>
						</form>
				</div>
			</div>
		<div>
	</section>
@endsection