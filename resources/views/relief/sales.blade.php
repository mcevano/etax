@extends('layouts.app')
@section('title', '| Sales')
@section('content')
<main class="container container-main margin-container">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb-holder">
	    <li class="breadcrumb-name active">Relief</li>
	    <li class="breadcrumb-name active" aria-current="page">Sales</li>
	  </ol>
	</nav>
	<section class="content-holder bg-white">
		<h5 class="font-orange label-title">VAT RELIEF: SALES</h5>
		<hr>
		<a href="/relief/download/sale" class="btn btn-success">DOWNLOAD EXCEL FORMAT</a>
		<br><br>
		<form method="POST" action="/relief/sale/{{$company->id}}" class="needs-validation" enctype="multipart/form-data">
		  	@csrf	
		  	@if (session('warning'))
                <div class="alert alert-danger">
                    {{ session('warning') }}
            	</div>
            @endif
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDate">Date:</label>
					<input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : ''}}" id="inputDate" name="date" value="{{ old('date') }}">
				</div>
				<div class="form-group col-md-6">
					<label for="inputFiscal">Fiscal Month:</label>
					<input type="text" class="form-control {{ $errors->has('fiscal') ? 'is-invalid' : ''}}" id="inputFiscal" name="fiscal" value="{{ old('fiscal') }}">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-5">
					<label>Taxpayer Identification Number:</label>
					<input type="text" class="form-control"  name="tin" value="{{ $company->tin1.'-'.$company->tin2.'-'.$company->tin3 }}" readonly>
				</div>
				<div class="form-group col-md-2">
					<label for="inputRDO">RDO Code:</label>
					<input type="text" class="form-control" name="rdo" value="{{ $company->rdo_code }}" readonly>
				</div>
				<div class="form-group col-md-5">
					<label for="inputBusiness">Line of Business:</label>
					<input type="text" class="form-control" name="business_line" value="{{ $company->line_business }}" readonly>
				</div>
			</div>
			<label for="inputName">Taxpayer's Name (Last Name, First Name, Middle Name for Individual):</label>
				<div class="form-row">
				    <div class="form-group col-md-4">
				    	<label for="lastname">Last Name:</label>
				        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $company->lastname }}"  autocapitalize="word" onblur="capitalize(this)" readonly>
				    </div>
				    <div class="form-group col-md-4">
				    	<label for="firstname">First Name:</label>
				        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $company->firstname }}"  autocapitalize="word" onblur="capitalize(this)" readonly>
				    </div>
				    <div class="form-group col-md-4">
				    	<label for="middlename">Middle Name:</label>
				        <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $company->middlename }}"  autocapitalize="word" onblur="capitalize(this)" readonly>
				    </div>
				</div>
				<div class="form-group">
					<label>Registered Name (For Non-Individual)</label>
					<input type="text" class="form-control" id="inputName" name="registered_name" value="{{ $company->registered_name }}" readonly >
				</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputCity">City:</label>
					<input type="text" value="{{ $company->city }}" name="city" class="form-control" readonly >
				</div>
				<div class="form-group col-md-4">
					<label for="inputDistrict">District:</label>
					<input type="text" value="{{ $company->district }}" name="district" class="form-control" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="inputSubstreet">Substreet:</label>
					<input type="text" class="form-control" name="substreet"  value="{{ $company->substreet }}" readonly>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>Street:</label>
					<input type="text" value="{{ $company->street }}" name="street" class="form-control" readonly >
				</div>
				<div class="form-group col-md-6">
					<label>Barangay:</label>
					<input type="text" value="{{ $company->barangay }}" name="barangay" class="form-control" readonly>
				</div>
				<div class="form-group col-md-3">
					<label>Zip Code:</label>
					<input type="text" value="{{ $company->zip_code }}" name="zip_code" class="form-control" readonly >
				</div>
				<input type="hidden" name="type" value="sales"/>
			</div>
			<hr>
		    <div class="form-group">
		    	<label for="file">Excel File:</label>
		    	<input type="file" name="excel" class="form-control-file" id="file">
		    	<span class="text-danger">{{ $errors->has('excel') ? 'Please select file to upload.' : ''}}</span>
		    </div>
		    <button type="submit" class="btn btn-primary">Generate Dat.File</button>
		    <a href="/relief/{{ $company->id }}/histories/sales" class="btn btn-danger">Back</a>
		</form>
	</section>
</main>
@endsection