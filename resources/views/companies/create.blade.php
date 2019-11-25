@extends('layouts.app')

@section('content')
<main class="container container-main margin-container">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb-holder">
	    <li class="breadcrumb-name active">Companies</li>
	    <li class="breadcrumb-name active" aria-current="page">Add Company</li>
	  </ol>
	</nav>
	<section class="content-holder bg-white">
		<h5 class="font-orange label-title">NEW COMPANY</h5>
		<hr>
		<form method="POST" action="/companies" class="needs-validation new-company">
			@csrf
				<div class="form-row">
				    <div class="form-group col-md-5">
				      <label><span class="font-red"><strong>*</strong></span> Taxpayer Identification Number:</label>
				      <div class="row">
				      	<div class="col-lg-3">
				      		<input type="text" maxlength="3" class="form-control {{ $errors->has('tin1') ? 'is-invalid' : ''}}" id="inputTin1" name="tin1" value="{{ old('tin1') }}" onkeypress="return numbersonly(this, event)" />
				      	</div>
				      	<div class="col-lg-3">
				      		<input type="text" maxlength="3" class="form-control {{ $errors->has('tin2') ? 'is-invalid' : ''}} tin-number" id="inputTin2" name="tin2" value="{{ old('tin2') }}" onkeypress="return numbersonly(this, event)" />
				      	</div>
				      	<div class="col-lg-3">
				      		<input type="text" maxlength="3" class="form-control {{ $errors->has('tin3') ? 'is-invalid' : ''}} tin-number" id="inputTin3" name="tin3" value="{{ old('tin3') }}" onkeypress="return numbersonly(this, event)" />
				      	</div>
				      	<div class="col-lg-3">
				      		<input type="text" maxlength="3" class="form-control {{ $errors->has('tin4') ? 'is-invalid' : ''}} tin-number" id="inputTin4" name="tin4" value="{{ old('tin4') }}" onkeypress="return numbersonly(this, event)" />
				      	</div>
				      </div>
				      <div class="row">
				      	<div class="col-lg-6">
				      		@if($errors->has('tin1'))
					      		@foreach($errors->get('tin1') as $message)
					      			<label class="font-sm text-danger">
					      				{{$message}}
					      			</label>
					      		@endforeach
					      	@endif
					      	@if($errors->has('tin2'))
					      		@foreach($errors->get('tin2') as $message)
					      			<br>
					      			<label class="font-sm text-danger">
					      				{{$message}}
					      			</label>
					      		@endforeach
					      	@endif
					    </div>
					    <div class="col-lg-6">
					      	@if($errors->has('tin3'))
					      		@foreach($errors->get('tin3') as $message)
					      			<label class="font-sm text-danger">
					      				{{$message}}
					      			</label>
					      		@endforeach
					      	@endif
					      	@if($errors->has('tin4'))
					      		@foreach($errors->get('tin4') as $message)
					      			<br>
					      			<label class="font-sm text-danger">
					      				{{$message}}
					      			</label>
					      		@endforeach
					      	@endif
				      	</div>
				      </div>
				    </div>
				    <div class="col-md-3">
				      <label for="inputRDO"><span class="font-red"><strong>*</strong></span> RDO Code:</label>
				      <select id="inputRDO" name="rdo_code" class="form-control">
				      	 @foreach ($rdo as $each)
				      		<option value="{{ $each->rdo }}">{{ $each->rdo }}</option>
				      	@endforeach
				      </select>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputBusiness"><span class="font-red"><strong>*</strong></span> Line of Business:</label>
				      <input type="text" class="form-control {{ $errors->has('business_line') ? 'is-invalid' : ''}}" id="inputBusiness" name="business_line" value="{{ old('business_line') }}" onblur="capitalize(this)">
				      	@if($errors->has('business_line'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('business_line') }}
					      	</label>
					    @endif
				    </div>

				</div>
				@if($errors->has('registered_name'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('registered_name') }}
					      	</label><br>
				@endif
				<label for="inputName">Taxpayer's Name (For Individual):</label>
				<div class="form-row">
				    <div class="form-group col-md-4">
				    	<label for="lastname">Last Name:</label>
				        <input type="text" class="form-control" id="lastname" name="lastname" value="{{  old('lastname') }}"  autocapitalize="word" onblur="capitalize(this)" >
				    </div>
				    <div class="form-group col-md-4">
				    	<label for="firstname">First Name:</label>
				        <input type="text" class="form-control" id="firstname" name="firstname" value="{{  old('firstname') }}"  autocapitalize="word" onblur="capitalize(this)" >
				    </div>
				    <div class="form-group col-md-4">
				    	<label for="middlename">Middle Name:</label>
				        <input type="text" class="form-control" id="middlename" name="middlename" value="{{  old('middlename') }}"  autocapitalize="word" onblur="capitalize(this)" >
				    </div>
				</div>
				<div class="form-group">
					<label>Registered Name (For Non-Individual)</label>
					<input type="text" class="form-control" id="inputName" name="registered_name" value="{{  old('registered_name') }}"  autocapitalize="word" onblur="capitalize(this)" >
				</div>
				<h5 class="border-line"><span>FOR VAT RELIEF</span></h5>
				<div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputCity"><span class="font-red"><strong>*</strong></span> City:</label>
				      <input type="text" value="{{ old('city') }}" class="form-control  {{ $errors->has('city') ? 'is-invalid' : ''}}" id="inputCity" name="city" onblur="capitalize(this)" >
				      	@if($errors->has('city'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('city') }}
					      	</label>
					    @endif
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputDistrict"> District:</label>
				      <input type="text" value="{{ old('district') }}" class="form-control" id="inputDistrict" name="district" onblur="capitalize(this)" >
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputSubstreet"> Substreet:</label>
				      <input type="text" class="form-control" id="inputZip" value="{{ old('substreet') }}" name="substreet" onblur="capitalize(this)" >
				    </div>
				</div>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputStreet"><span class="font-red"><strong>*</strong></span> Street:</label>
				      <input type="text" class="form-control {{ $errors->has('street') ? 'is-invalid' : ''}}" value="{{ old('street') }}" id="inputStreet" name="street" onblur="capitalize(this)">
				      	@if($errors->has('street'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('street') }}
					      	</label>
					    @endif
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputBarangay"><span class="font-red"><strong>*</strong></span> Barangay:</label>
				      <input type="text" value="{{ old('barangay') }}" class="form-control {{ $errors->has('barangay') ? 'is-invalid' : ''}}" id="inputBarangay" name="barangay"  onblur="capitalize(this)" >
				      	@if($errors->has('barangay'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('barangay') }}
					      	</label>
					    @endif
				    </div>
				</div>
				<hr>
				<div class="form-group">
					<label for="inputAddress"><span class="font-red"><strong>*</strong></span> Address:</label>
					<input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" id="inputAddress" value="{{ old('address') }}" name="address"  onblur="capitalize(this)">
					@if($errors->has('address'))
					      		@foreach($errors->get('address') as $message)
					      			<label class="font-sm text-danger">
					      				{{$message}}
					      			</label>
					      		@endforeach
					@endif
				</div>
				<div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputZip"><span class="font-red"><strong>*</strong></span> Zip/Postal Code:</label>
				      <input type="text" class="form-control {{ $errors->has('zip') ? 'is-invalid' : ''}}" id="inputZip" value="{{ old('zip') }}" name="zip"  onblur="capitalize(this)">
				       	@if($errors->has('zip'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('zip') }}
					      	</label>
					    @endif
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputContact"><span class="font-red"><strong>*</strong></span> Telephone Number:</label>
				      <input type="text" class="form-control {{ $errors->has('contact') ? 'is-invalid' : ''}}" value="{{ old('contact') }}" id="inputContact" name="contact" >
				      	@if($errors->has('contact'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('contact') }}
					      	</label>
					    @endif
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputEmail"><span class="font-red"><strong>*</strong></span> Email Address:</label>
				      <input type="email" value="{{ Auth::user()->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : 'is-valid'}}" id="inputEmail" name="email_address"  >
				      @if($errors->has('email'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('email') }}
					      	</label>
					    @endif
				    </div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-save-company" >
					  Save
					</button>
					<a href="/companies" class="btn btn-danger">Back</a>
				</div>
				<div class="modal fade" id="saveCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalCenterTitle">Success!</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        	You have successfully added a company.
				      </div>
				      <div class="modal-footer">
				        <button type="submit" class="btn btn-primary">Okay</button>
				      </div>
				    </div>
				  </div>
				</div>
			</form>
		</section>
</main>
@endsection